<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAjaxController;
use App\Http\Controllers\CustomerController;

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
    return view('welcome');
});

Route::get('/test', [TestController::class, 'index']);

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // ホーム画面
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // ユーザー管理画面
    Route::get('/user', [UserController::class, 'index'])->name('user_index');
    Route::post('/user/create', [UserController::class, 'create'])->name('user_create');
    Route::post('/user/update', [UserController::class, 'update'])->name('user_update');
    Route::post('/user/delete', [UserController::class, 'delete'])->name('user_delete');

    Route::get('/user/modal/{id}', [UserAjaxController::class, 'sendUserData'])->name('modal_data');
    Route::get('/user/search/{name}', [UserAjaxController::class, 'searchUserData'])->name('search_user');
    Route::get('/user/all', [UserAjaxController::class, 'sendAllUserList'])->name('all_user_list');
    Route::get('/user/admin', [UserAjaxController::class, 'sendAdminUserList'])->name('admin_user_list');
    Route::get('/user/common', [UserAjaxController::class, 'sendCommonUserList'])->name('common_user_list');

    // お客様管理画面
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer_index');
});
