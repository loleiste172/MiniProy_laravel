<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function(){
    if(auth()->check()){
        return redirect('/');
    }
    return view('login');
});

Route::get('/register', function(){
    if(auth()->check()){
        return redirect('/');
    }
    return view('register');
});

Route::get('/dashboard', function(){
    if(auth()->check()){
        return view('dashboard');
    }
    //alternativamente mandarlo a login diciendole que necesita autorizacion
    return view('index');
});

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/store',  [UserController::class, 'store'])->name('store');

Route::post('/login-user', [UserController::class, 'login'])->name('login-user');


Route::get('/logout', [UserController::class, 'logout']);



// Route::controller(UserController::class)->group(function() {

// Route::get('/dashboard', 'dashboard')->name('dashboard');
// });
