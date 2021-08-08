<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'index']);

Auth::routes();

// ホーム画面
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ユーザー管理画面
Route::get('/user', [UserController::class, 'index'])->name('user_index');
Route::post('/user', [UserController::class, 'indexRadio']);
Route::post('/user/create', [UserController::class, 'create'])->name('user_create');
Route::post('/user/update', [UserController::class, 'update'])->name('user_update');
Route::post('/user/delete', [UserController::class, 'delete'])->name('user_delete');
