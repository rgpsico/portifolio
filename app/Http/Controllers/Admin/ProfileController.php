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
            return view('Admin.profile.index',[
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
                'image',
                'curriculum',
                'anosExperiencia',
                'numeroProjetos'
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
            $user->anosExperiencia = $data['anosExperiencia'];
            $user->numeroProjetos = $data['numeroProjetos'];
  

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

         if ($request->hasFile('image') && $request->file('image')->isValid()) 
         {
             $this->Upload($request->file('image'),'users');
         }

        if ($request->hasFile('curriculum') && $request->file('curriculum')->isValid())
        {
            $this->Upload($request->file('curriculum'),'users');
                      
        }

         $user->save();
         return redirect()->route('profile')
         ->with('warning',"informações alteradas com sucesso");
    }
     
        return redirect()->route('profile');

    }

    public function Upload($request, $pasta = null)
    {      
        $loggeid = intval(Auth::id());    
        $user = User::find($loggeid);
     
        $name = uniqid(date('HisYmd'));
         
        $extension = $request->extension();
      
        $nameFile = "{$name}.{$extension}";
        $pasta = ($pasta == null ? "" : $pasta); 


        $upload = $request->storeAs($pasta, $nameFile);
     
        $user->curriculum  = $nameFile;  
        $user->save();


    }


}
