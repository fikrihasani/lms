<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AppController::class,'index']);
Route::get('/info',[AppController::class,'info']);
Route::get('/answer',[AppController::class,'answer']);
Route::get('/answer/result/{id}',[AppController::class,'result']);
Route::post('/answerStore',[AppController::class,'answerStore']);
Route::get('/admin',[AdminController::class,'index']);
Route::get("/admin/recap",[AdminController::class,'recapAns']);
Route::resource('question', QuestionController::class);
Route::get('/admin/export/', [AdminController::class, 'export']);
