<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

Route::get('/dashboard', [ProductController::class, 'showDashboard'])->middleware('can:View-dashboard')->name('dashboard');
Route::get('/add', [ProductController::class, 'vShow'])->name('AddProd');

//Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/store',  [UserController::class, 'store'])->name('store');

Route::post('/login-user', [UserController::class, 'login'])->name('login-user');
Route::post('/add-product', [ProductController::class, 'createProd'])->middleware('can:Add-Product')->name('add-prod');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/edit/{product}', [ProductController::class, 'showEditPage'])->middleware('can:Edit-Product')->name('EditProd');

Route::put('/edit/{product}', [ProductController::class, 'editProd'])->middleware('can:Edit-Product')->name('edit-prod');
Route::delete('/delete/{product}', [ProductController::class, 'deleteProduct'])->middleware('can:Delete-Product')->name('del-prod');

Route::get('/show/{product}', [ProductController::class, 'showProd'])->middleware('can:Show-Product')->name('ShowProd');

Route::get('/admin', [UserController::class, 'showAdmin'])->middleware('can:Admin-Dashboard')->name('Admin-Dashboard');
Route::get('/add_user', [UserController::class, 'showAddUser'])->middleware('can:Add-User')->name('Adduser');
Route::post('/add_user', [UserController::class, 'Adduser'])->middleware('can:Add-User')->name('a-add-user');
Route::get('/edit_user/{user}', [UserController::class, 'showEditUser'])->middleware('can:Edit-User')->name('EditUser');
Route::put('/edit_user/{user}', [UserController::class, 'EditUser'])->middleware('can:Edit-User')->name('a-edit-user');
Route::delete('/delete_user/{user}', [UserController::class, 'DelUser'])->middleware('can:Del-User')->name('a-del-user');

// Route::controller(UserController::class)->group(function() {

// Route::get('/dashboard', 'dashboard')->name('dashboard');
// });
