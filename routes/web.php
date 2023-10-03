<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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
Route::get('/', [StudentController::class,'index'])->name('index');
Route::get('/signup', [UserController::class,'signup']);
Route::post('/customsignup', [UserController::class,'customsignup']);
Route::get('/login', [UserController::class,'login']);
Route::post('/customlogin', [UserController::class,'customlogin']);
Route::get('/showstudent/{id}', [StudentController::class,'showstudent']);

Route::group(['middleware' => ['auth']], function(){
Route::get('/logout', [UserController::class,'logout']);
Route::get('/addstudent', [StudentController::class,'addstudent']);
Route::post('/storestudent', [StudentController::class,'storestudent']);
Route::get('/editstudent/{id}', [StudentController::class,'editstudent']);
Route::put('/updatestudent/{id}', [StudentController::class,'updatestudent']);
Route::delete('/deletestudent/{id}', [StudentController::class,'deletestudent']);
});

