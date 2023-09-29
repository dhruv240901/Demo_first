<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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
Route::get('/', [StudentController::class,'index']);

Route::get('/addstudent', [StudentController::class,'addstudent']);
Route::post('/storestudent', [StudentController::class,'storestudent']);
Route::get('/showstudent/{id}', [StudentController::class,'showstudent']);
Route::get('/editstudent/{id}', [StudentController::class,'editstudent']);
Route::put('/updatestudent/{id}', [StudentController::class,'updatestudent']);
Route::delete('/deletestudent/{id}', [StudentController::class,'deletestudent']);


