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

Route::get('/', function () {
    return view('admin.index');
});

Route::prefix('admin')->group(function () {
    //User
    Route::get('user', [UserController::class, 'index']);
    Route::get('user/create', [UserController::class, 'create']);
    Route::post('user/create', [UserController::class, 'store']);

    //SendEmail
    Route::get('FormSendEmail', [UserController::class, 'email']);
    Route::post('send', [UserController::class, 'sendMailUserProfile'])->name('send');

    //Role
    Route::get('role', [RoleController::class, 'index']);

    //Permission
    Route::get('permission', [PermissionController::class, 'index']);

    //Product
    Route::get('product', [ProductController::class, 'index']);

    //Category
    Route::get('category', [CategoryController::class, 'index']);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
