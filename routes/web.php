<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes(['verify' => true]);
Route::get('/', function () {
    return redirect('/home');
});

//Student
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Admin
Route::group(['prefix' => 'admin',  'middleware' => ['admin.verify','auth']], function () {
    //User
    Route::resource('user', UserController::class);

    //SendEmail
    Route::get('FormSendEmail', [UserController::class, 'email']);
    Route::post('send', [UserController::class, 'sendMailUserProfile'])->name('send');

    //Role
    Route::resource('role', RoleController::class);

    //Permission
    Route::resource('permission', PermissionController::class);

    //Product
    Route::resource('product', ProductController::class);

    //Category
    Route::resource('category', CategoryController::class);
});
