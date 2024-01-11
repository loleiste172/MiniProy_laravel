<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $request) {

        $fields=$request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);
        $fields['rol']="ventas";
        $fields['password']=bcrypt($fields['password']);
        $fields['name']=strip_tags($fields['name']);
        $fields['email']=strip_tags($fields['email']);
        //dd($fields);
        $user=User::create($fields);
        auth()->login($user);
        
        return redirect('/');
    }
    public function login(Request $request) {
       
        $fields=$request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => $fields['email'], 'password' => $fields['password']])){
            
            $request->session()->regenerate();
            return redirect('/');
        }


        return redirect('/login');//mandarle que esta erroneo en algo
    }
    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
