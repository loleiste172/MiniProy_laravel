<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $fields=$request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);
        $fields['rol']="ventas";
        $fields['password']=bcrypt($fields['password']);
        $fields['name']=strip_tags($fields['name']);
        $fields['email']=strip_tags($fields['email']);
        $user=User::create($fields);
        auth()->login($user);
        return redirect('/dashboard');
    }
    public function login(Request $request) {
        $fields=$request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(auth()->attempt(['email' => $fields['email'], 'password' => $fields['email']])){
            $request->session()->regenerate();
        }
    }
    public function logout() {
        auth()->logout();
        return redirect('/index');
    }
}
