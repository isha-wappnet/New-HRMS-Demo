<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
//     return view('auth\add-user');
// });

Route::get('register', [AuthController::class, "loadRegister"]);
Route::post('register', [AuthController::class, "registerAction"]);
Route::get('login', [AuthController::class, "loadLogin"]);
Route::post('dashboard', [AuthController::class, "loginAction"])->name('user');
Route::get('dashboard', [AuthController::class, "dashboard"]);
Route::get('logout', [AuthController::class, "performLogout"])->name('logout');



Route::get('forgotpassword', [UserController::class, "loadForgotPassword"])->name('forgotpassword');
Route::post('forgotPasswordValidate.check', [UserController::class, 'forgotPasswordValidate'])->name('forgotPasswordValidate');

//route for opening reset page after getting link in mail------------------------

Route::get('/resetpassword/{token}', [UserController::class, "resetpassword"])->name('resetpassword');
Route::post('reset', [UserController::class, "submitresetpassword"])->name('submit');
Route::get('changepassword', [UserController::class, "changepassword"]);
Route::POST('changepassword', [UserController::class, "submitchangepassword"])->name('change');

//update user profile-------------------------------------------------

Route::get('userprofile', [UserController::class, "userprofile"]);
Route::post('userprofile', [UserController::class, "profileUpdate"])->name('update');


//Data table routes---------------------------------------------------

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::delete('/delete/{id}', [UserController::class, "delete"])->name('users.destroy')->middleware(['auth','role:admin']);
Route::get('/edit/{id}', [UserController::class, "edit"])->name('users.edit')->middleware(['auth','role:admin']);
Route::put('update', [UserController::class, "editprofile"])->name('edit')->middleware(['auth','role:admin']);

//add user --------------------------------------------------------

Route::get("adduser",[UserController::class,'adduser']);
Route::post('add-user',[UserController::class,"add_user"]);

?>