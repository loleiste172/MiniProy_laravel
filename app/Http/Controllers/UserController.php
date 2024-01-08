<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $fields=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

    }
    public function login(Request $request) {
        $fields=$request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
    }
}
