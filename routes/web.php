<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//view login -> index
Route::get('/', IndexController::class)->name('login')->middleware('guest');

//view home 
Route::get('home', [HomeController::class, 'home'])->name('home')->middleware('auth');


//view users
Route::get('users', [UserController::class, 'usersView'])->name('users')->middleware('auth');
//Login post users
Route::post('users/login', [UserController::class, 'login']);
//Logout user
Route::post('users/logout', [UserController::class, 'logout']);


//create post users
Route::post('users/create', [UserController::class, 'create']);
//Edit get user to view
Route::get('users/{user}/edit', [UserController::class, 'editView'])->name('users.edit')->middleware('auth');
//PUT edit user
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
