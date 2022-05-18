<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SchoolController;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

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
Route::get('/informasi',[AppController::class,'informasi']);
Route::get('/answer',[AppController::class,'answer']);
Route::get('/answer/result/{id}',[AppController::class,'result']);
Route::post('/answerStore',[AppController::class,'answerStore']);

Route::prefix('/admin')->group(function(){
    Route::get('/',[AdminController::class,'index']);
    Route::get("/recap",[AdminController::class,'recapAns']);
    Route::resource('/question', QuestionController::class);
    Route::get('/question/data/{questionType}', [QuestionController::class,'showData']);
    Route::get('/export/{idKelas}', [AdminController::class, 'export']);
    Route::get('/school',[SchoolController::class,'index'])->name('admin.school.index');
    Route::post('/school/store',[SchoolController::class,'store'])->name('admin.school.store');
});
Route::post('/ckeditor/upload',[CkeditorController::class,'upload'])->name('ckeditor.image-upload');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/register',[RegisterController::class,'register'])->name('register');
Route::get('/register/admin',[RegisterController::class,'registerAdmin'])->name('register.admin');
Route::post('/register/store',[RegisterController::class,'store'])->name('register.store');
Route::post('/register/admin/store',[RegisterController::class,'storeAdmin'])->name('register.admin.store');
Route::post('/authenticate',[AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/kelas/{school}',[AppController::class,'getKelas'])->name('getkelas');