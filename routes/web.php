<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Models\File_mgmt_Controller;

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
    return view('welcome');
});

// {{-----------------------User Routes-----------------------}}
Route::get('register',[UserController::class,'Index'])->name('register');
Route::post('store', [UserController::class,'store'])->name('store');
Route::get('login',[UserController::class,'login'])->name('login');
Route::post('logincheck',[UserController::class,'logincheck'])->name('logincheck');
Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::get('forgot',[UserController::class,'forgot'])->name('forgot')->middleware('auth.check');
Route::get('DeleteUser/{id}',[userController::class,'destroy'])->name('DeleteUser')->middleware('auth.check');
Route::get('update',[userController::class,'UpdatePassword'])->name('UpdateUser')->middleware('auth.check');


// Route::post('/logout', 'userController@logout');

//
// {{-----------------------File Routes-----------------------}}
Route::get('index',[fileController::class,'index'])->name('index')->middleware('auth.check');
Route::get('upload',[fileController::class,'upload'])->name('upload')->middleware('auth.check');
Route::POST('uploaded',[fileController::class,'uploaded'])->name('uploaded')->middleware('auth.check');
Route::get('delete/{id}',[fileController::class,'destroy'])->name('delete')->middleware('auth.check');
// Route::prefix('admin')->group(function () {
//         Route::get('/', 'AdminController@index')->name('Dashboard');
//     });
// Route::get('/admin/index',[AdminController::class,'index'])->name('adminindex');

// {{-----------------------Admin Routes-----------------------}}
Route::get('/admin/login',[AdminController::class,'login'] )->name('AdminLogin');
Route::post('/admin/logincheck',[AdminController::class,'logincheck'] )->name('AdminLoginchk');
Route::get('/admin/dashboard',[AdminController::class,'index'] )->name('Dashboard')->middleware('auth.check');
Route::get('/admin/users', [AdminController::class,'users'])->name('AllUsers')->middleware('auth.check');
Route::get('/admin/files', [AdminController::class,'files'])->name('AllFiles')->middleware('auth.check');
Route::get('/admin/DeleteFile/{id}',[AdminController::class,'destroy'])->name('DeleteUseradmin');
Route::get('/admin/forgot',[AdminController::class,'showUpdatePasswordForm'])->name('adminpassupdateform')->middleware('auth.check');;
Route::post('/admin/forgot/show',[AdminController::class,'UpdatePassword'])->name('adminpassupdate');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('Adminlogout')->middleware('auth.check');;
// Route::get('/admin/logout',[UserController::class,'logout'])->name('adminlogout');
// Route::get('update/{id}',[userController::class,'destroy'])->name('');
// Route::get('/admin/update-password', [AdminController::class, 'showUpdatePasswordForm'])->name('admin.update.password.form');
// Route::post('/admin/update-password', [AdminController::class, 'updatePassword'])->name('admin.update.password');


Route::get('/chartjs', function () {
    return view('admin/chartjs');
});


