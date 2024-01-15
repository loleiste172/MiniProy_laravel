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
        $user->assignRole('Ventas');
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
            $user_rol=auth()->user()->getRoleNames();
            return view('/users', ['users' => $users, 'rol' => $user_rol[0]]);
        }
    }
    public function showAddUser() {
        if(auth()->check()){
            return view('adduser');
        }
    }
    public function AddUser(Request $request) {
        if(auth()->check()){
            $rol_name=$request->rol;
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
            $user=User::create($fields);
            $user->assignRole($rol_name);
            return redirect('/admin');
        }
    }
    public function showEditUser(User $user){
        if(auth()->check()){
            $user_rol=$user->getRoleNames();
            return view('edituser', ['user' => $user, 'rol' => $user_rol[0]]);
        }
    }
    public function EditUser(User $user, Request $request){
        
        if(auth()->check()){
            
            $rol_name=$request->rol;
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
            $user->syncRoles([]);
            $user->assignRole($rol_name);
            return redirect('/admin');
        }
    }
    public function DelUser(User $user){
        $user->delete();
        return redirect('/admin');
    }
}
