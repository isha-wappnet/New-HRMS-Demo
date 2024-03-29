<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\UploadController;
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


Route::controller(AuthController::class)->group(function(){

    //route for registration
    Route::get('register','loadRegister');
    Route::post('register','registerAction');

    //route for login
    Route::get('login','loadLogin');
    Route::post('dashboard','loginAction')->name('user');

    //route for dashboard
    Route::get('dashboard','dashboard');
    Route::get('logout','performLogout')->name('logout');

});

Route::controller(UserController::class)->group(function(){

    //route for forget password
    Route::get('forgotpassword','loadForgotPassword')->name('forgotpassword');
    Route::post('forgotPasswordValidate.check','forgotPasswordValidate')->name('forgotPasswordValidate');

    //route for opening reset page after getting link in mail
    Route::get('/resetpassword/{token}','resetpassword')->name('resetpassword');
    Route::post('reset','submitresetpassword')->name('submit');
    Route::get('changepassword','changepassword');
    Route::POST('changepassword','submitchangepassword')->name('change');

    //update user profile
    Route::get('userprofile','userprofile');
    Route::post('userprofile','profileUpdate')->name('update');

    //Data table routes
    Route::get('users','index')->name('users.index');
    Route::delete('/delete/{id}','delete')->name('users.destroy')->middleware(['auth','role:admin']);
    Route::get('/edit/{id}','edit')->name('users.edit')->middleware(['auth','role:admin']);
    Route::put('update','editprofile')->name('edit')->middleware(['auth','role:admin']);

    //add user 
    Route::get("adduser",'adduser');
    Route::post('add-user','add_user');
});


Route::controller(LeavesController::class)->group(function(){

    //route for leaves 
    Route::get('leave','index')->name('leaves.index');
    Route::get('/leaves/create','create')->name('leaves.create');
    
    //list leaves table
    Route::get('leaves/list','showLeaves')->name('leaves.list');
    Route::post('/leave-request','store')->middleware('auth')->name('leave-request.store');
    Route::put('/leaves/{id}', 'updateLeaveStatus')->name('leaves.update');
});


Route::controller(UploadController::class)->group(function(){

    //upload file 
    Route::get('upload',"uploadfile");
    Route::post('/upload-file', 'fileUpload')->name('fileUpload');

});
