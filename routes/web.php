<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
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

//Login post users
Route::post('users/login', [UserController::class, 'login']);
//Logout user
Route::post('users/logout', [UserController::class, 'logout']);


//view users
Route::get('users', [UserController::class, 'usersView'])->name('users')->middleware('auth');
//create post users
Route::post('users/create', [UserController::class, 'create']);
//Edit get user to view
Route::get('users/{user}/edit', [UserController::class, 'editView'])->name('users.edit')->middleware('auth');
//PUT edit user
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
//Search user
Route::get('users/search', [UserController::class, 'search']);


//View teacher
Route::get('teacher', [TeacherController::class, 'teachersView'])->name('teacher')->middleware('auth');
//create teacher
Route::post('teacher/create', [TeacherController::class, 'create']);
//edit teacher view
Route::get('teacher/{teachers}/edit', [TeacherController::class, 'editView'])->name('teacher.edit')->middleware('auth');
//update teacher
Route::put('teacher/{teachers}', [TeacherController::class, 'update'])->name('teacher.update');
//Search teacher
Route::get('teacher/search', [TeacherController::class, 'search']);

//View Student
Route::get('students', [StudentController::class, 'studentsView'])->name('students')->middleware('auth');
//create student
Route::post('students/create', [StudentController::class, 'create']);
//create student
Route::get('students/{students}/edit', [StudentController::class, 'editView'])->name('student.edit')->middleware('auth');
//update student
Route::put('students/{students}', [StudentController::class, 'update'])->name('student.update');
//Search student
Route::get('students/search', [StudentController::class, 'search']);


//View subjects
Route::get('subjects', [SubjectController::class, 'subjectsView'])->name('subjects')->middleware('auth');
//create subjects
Route::post('subjects/create', [SubjectController::class, 'create']);
//edit subjects view
Route::get('subjects/{subjects}/edit', [SubjectController::class, 'editView'])->name('subjects.edit')->middleware('auth');
//update subjects
Route::put('subjects/{subjects}', [SubjectController::class, 'update'])->name('subjects.update');
//Search subject
Route::get('subjects/search', [SubjectController::class, 'search']);


//View score
Route::get('score', [ScoreController::class, 'scoreView'])->name('score')->middleware('auth');
//create score
Route::post('score/create', [ScoreController::class, 'create']);
//edit score view
Route::get('score/{score}/edit', [ScoreController::class, 'editView'])->name('score.edit')->middleware('auth');
//update score
Route::put('score/{score}', [ScoreController::class, 'update'])->name('score.update');
//Search score
Route::get('score/search', [ScoreController::class, 'search']);
