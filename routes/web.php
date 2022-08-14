<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use App\Models\School;
use App\Models\User;
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

Route::prefix('/admin')->middleware('role:admin')->group(function(){
    Route::get('/',[AdminController::class,'index']);
    Route::get("/recap",[AdminController::class,'recapAns']);
    Route::resource('/question', QuestionController::class);
    Route::get('/question/probs/{questionType}',[QuestionController::class,'probs']);
    Route::get('/export/{idKelas}/{isTeacher}', [AdminController::class, 'export']);
    Route::get('/school',[SchoolController::class,'index'])->name('admin.school.index');
    Route::post('/school/store',[SchoolController::class,'store'])->name('admin.school.store');
    Route::get('/school/{id}',[SchoolController::class,'info'])->name('admin.school.info');
    Route::get('/school/{id}/edit',[SchoolController::class,'edit'])->name('admin.school.edit');
    Route::post('/school/addKelas/{id}',[SchoolController::class,'addKelas']);
    Route::get('/kelas',[KelasController::class,'index']);
    Route::get('/kelas/{id}',[KelasController::class,'info'])->name('admin.kelas.info');
    Route::get('/kelas/{id}/edit',[KelasController::class,'edit'])->name('admin.kelas.edit');
    Route::delete('/kelas/delete/{id}',[KelasController::class,'removeTeacher']);
    Route::delete('/kelas/{kela}',[KelasController::class,'destroy'])->name('admin.kelas.delete');
    Route::post('/kelas/addTeacher',[KelasController::class,'addTeacher'])->name('admin.kelas.addTeacher');
    Route::get('/users',[UserController::class,'index']);
    Route::get('/users/{id}',[UserController::class,'show'])->name('admin.users.info');
    Route::get('/users/add/{idSekolah}',[UserController::class,'add']);
    Route::get('/users/{id}/edit',[UserController::class,'edit']);
    Route::put('/users/{id}',[UserController::class,'update'])->name('admin.user.update');
    Route::post('/users/store',[UserController::class,'store'])->name('admin.user.store');
});

Route::prefix('/guru')->middleware('role:guru')->group(function(){
    Route::get('/',[AdminController::class,'index']);
    Route::get("/recap",[AdminController::class,'recapAns']);
    // Route::resource('/question', QuestionController::class);
    // Route::get('/question/probs/{questionType}',[QuestionController::class,'probs']);
    // Route::get('/export/{idKelas}/{isTeacher}', [AdminController::class, 'export']);
    // Route::get('/school',[SchoolController::class,'index'])->name('admin.school.index');
    // Route::post('/school/store',[SchoolController::class,'store'])->name('admin.school.store');
    // Route::get('/school/{id}',[SchoolController::class,'info'])->name('admin.school.info');
    // Route::get('/school/{id}/edit',[SchoolController::class,'edit'])->name('admin.school.edit');
    // Route::post('/school/addKelas/{id}',[SchoolController::class,'addKelas']);
    // Route::get('/kelas',[KelasController::class,'index']);
    // Route::get('/kelas/{id}',[KelasController::class,'info'])->name('admin.kelas.info');
    // Route::delete('/kelas/delete/{id}',[KelasController::class,'removeTeacher']);
    // Route::delete('/kelas/{kela}',[KelasController::class,'destroy'])->name('admin.kelas.delete');
    // Route::post('/kelas/addTeacher',[KelasController::class,'addTeacher'])->name('admin.kelas.addTeacher');
    // Route::get('/users',[UserController::class,'index']);
    // Route::get('/users/{id}',[UserController::class,'show']);
    // Route::get('/users/add/{idSekolah}',[UserController::class,'add']);
    // Route::get('/users/{id}/edit',[UserController::class,'edit']);
    // Route::put('/users/{id}',[UserController::class,'update'])->name('admin.user.update');
    // Route::post('/users/store',[UserController::class,'store'])->name('admin.user.store');
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
