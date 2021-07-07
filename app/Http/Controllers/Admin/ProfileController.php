<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\hash;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index(){
        $loggeid = intval(Auth::id());    
        
        $user  = User::find($loggeid);

        
        if($user){
            return view('admin.profile.index',[
            'user' => $user
            ]);
    }
    return redirect()->route('admin');
    }

    public function save(Request $request){

        $loggeid = intval(Auth::id());  
        $user = User::find($loggeid);
        
        if($user){
            $data = $request->only([
                'name',
                'email',
                'cel',
                'description',
                'estate',
                'bairro',
                'curriculum',
                'password',
                'password_confirmation',
                'image'
            ]);
      
            $validator  = Validator::make([
            'name' => $data['name'],
            'email'=> $data['email']
            ],[
                'name'=> ['required','string','max:100'],
                'email'=>['required','string','email','max:100']
            ]);

         
            $user->name = $data['name'];
            $user->description = $data['description'];
            $user->cel = $data['cel'];
            $user->estate = $data['estate'];
            $user->bairro = $data['bairro'];
            $user->curriculum = $data['curriculum'];

            if($user->email != $data['email']){
                $hasEmail = User::where('email',$data['email'])->get();
                if(count($hasEmail) === 0){
                $user->email = $data['email'];
                }else{
                    $validator->errors()->add('email',__('validation.unique',[
                        'attribute'=>'email',
                        'min'=>4
                    ]));
              

                }
            }

            if(!empty($data['password'])){
                if(strlen($data['password']) >= 4){
                if($data['password'] ===  $data['password_confirmation']){
                    $user->password = Hash::make($data['password']);
                }else{
                    $validator->errors()->add('password',__('validation.confirmed',[
                        'attribute'=>'password'
                        
                    ]));  

                }
            }else{
                $validator->errors()->add('password',__('validation.min.string',[
                    'attribute'=>'password',
                    'min'=>4
                ]));            
            }
        }
         if(count($validator->errors()) > 0 ){
             return redirect()->route('profile',[
              'user'=>$loggeid
             ])->withErrors($validator);

         }

         if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->image->storeAs('users', $nameFile);
            $user->cover  = $nameFile;      
        }

        
       
         $user->save();

         return redirect()->route('profile')
         ->with('warning',"informações alteradas com sucesso");
    }

      
        return redirect()->route('profile');

    }
}
