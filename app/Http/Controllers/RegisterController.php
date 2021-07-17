<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegisterUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;;;

class RegisterController extends Controller
{
    public function index(){
        return view('Admin.register');
    }

    public function register(Request $request){
        $data  = $request->only([
        'name',
        'email',
        'password',
        'password_confirmation'
        ]);
        $validator = $this->validator($data);

        if($validator->fails()){
            return redirect()->route('register')
            ->withErrors($validator)
            ->withInput();
        }

        $user = $this->create($data);
        Auth::login($user);
         return redirect()->route('admin');


    }

    public function validator(array $data){
        return Validator::make($data,[
            'name' => ['required','string','max:100'],
            'email'=> ['required','string','email','max:100', 'unique:users'],
            'password'=>['required','string','min:4','confirmed']
        ]);
    }

    public function create(array $data){
        return User::create([
         'name' => $data['name'],
         'email'=> $data['email'],
         'password'=>Hash::make($data['password']),
        ]);
    }
}
