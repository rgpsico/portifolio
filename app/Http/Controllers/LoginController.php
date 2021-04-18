<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function index()
    {
        return view('Admin.login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->only([
            'email',
            'password',
            'remember'
        ]);

   
  
        $validator = $this->validator($data);
       
        if($validator->fails()){
            return redirect()->route('login')
            ->withErrors($validator)
            ->withInput();
        }
      
        
        if(Auth::attempt($data)){
          echo "aaa";
        }else{
            echo "bbbb";
        }

        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'email'    => ['required', 'string', 'email', 'max:100'],
            'password' => ['required', 'string', 'min:4']

        ]);
    }
}
