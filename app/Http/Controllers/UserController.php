<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        // if(!isset($fields['rol'])){
        //     $fields['rol']="ventas";
        // }
        
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
    public function showAdmin() {
        if(auth()->check()){
            $users=User::paginate(5);
            return view('/users')->with('users', $users);
        }
    }
    public function showAddUser() {
        if(auth()->check()){
            return view('adduser');
        }
    }
    public function AddUser(Request $request) {
        if(auth()->check()){
            $fields=$request->validate([
                'name' => 'required',
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:8', 'max:200']
            ]);
            // if(!isset($fields['rol'])){
            //     $fields['rol']="ventas";
            // }
            //TODO: VER QUE PEDO POR QUE NO VE ROL KJAJAJAK
            
            $fields['password']=bcrypt($fields['password']);
            $fields['name']=strip_tags($fields['name']);
            $fields['email']=strip_tags($fields['email']);
            //dd($fields);
            User::create($fields);
            return redirect('/admin');
        }
    }
    public function showEditUser(User $user){
        if(auth()->check()){
            return view('edituser', ['user' => $user]);
        }
    }
    public function EditUser(User $user, Request $request){
        
        if(auth()->check()){
            $fields=$request->validate([
                'name' => 'required',
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8', 'max:200']
            ]);
            // if(!isset($fields['rol'])){
            //     $fields['rol']="ventas";
            // }
            //TODO: VER QUE PEDO POR QUE NO VE ROL KJAJAJAK
            
            $fields['password']=bcrypt($fields['password']);
            $fields['name']=strip_tags($fields['name']);
            $fields['email']=strip_tags($fields['email']);
            $user->update($fields);
            return redirect('/admin');
        }
    }
    public function DelUser(User $user){
        $user->delete();
        return redirect('/admin');
    }
}
