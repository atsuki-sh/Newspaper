<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAjaxController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerAjaxController;
use App\Http\Controllers\DeliveryRouteController;
use App\Http\Controllers\DeliveryRouteAjaxController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PointAjaxController;

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
    // ユーザーのAjax通信
    Route::get('/user/modal/{id}', [UserAjaxController::class, 'sendUserData'])->name('modal_data');
    Route::get('/user/{admin}', [UserAjaxController::class, 'sendUserList'])->name('user_list');
    Route::post('/user/search', [UserAjaxController::class, 'searchUserData'])->name('search_user');

    // 顧客管理画面
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer_index');
    Route::post('/customer/create', [CustomerController::class, 'create'])->name('customer_create');
    Route::post('/customer/update', [CustomerController::class, 'update'])->name('customer_update');
    Route::post('/customer/delete', [CustomerController::class, 'delete'])->name('customer_delete');
    // 顧客のAjax通信
    Route::get('/customer/modal/{id}', [CustomerAjaxController::class, 'sendCustomerModal'])->name('customer_modal');
    Route::get('/customer/list', [CustomerAjaxController::class, 'sendCustomerList'])->name('customer_list');
    Route::post('/customer/search', [CustomerAjaxController::class, 'searchCustomerData'])->name('customer_search');

    // ポイント管理画面
    Route::get('/point', [PointController::class, 'index'])->name('point_index');
    Route::post('/point/update', [PointController::class, 'update'])->name('point_update');
    Route::post('/point/delete', [PointController::class, 'delete'])->name('point_delete');
    // ポイントの顧客情報
    Route::post('/point/customer_update', [PointController::class, 'customerUpdate'])->name('point_customer_update');
    Route::post('/point/customer_delete', [PointController::class, 'customerDelete'])->name('point_customer_delete');
    // ポイントのAjax通信
    Route::get('/point/modal/{id}', [PointAjaxController::class, 'sendPointModal'])->name('point_modal');
    Route::post('/point/search', [PointAjaxController::class, 'searchPointData'])->name('point_search');
    Route::get('/point/list', [PointAjaxController::class, 'sendPointList'])->name('point_list');
    // ポイントの顧客のAjax通信
    Route::get('/point/customer_modal/{id}', [PointAjaxController::class, 'sendCustomerModal'])->name('point_customer_modal');
    Route::post('/point/customer_search', [PointAjaxController::class, 'searchCustomerData'])->name('point_customer_search');

    // ルート管理画面
    Route::get('/route', [DeliveryRouteController::class, 'index'])->name('route_index');
    Route::post('/route/create', [DeliveryRouteController::class, 'create'])->name('route_create');
    Route::post('/route/update', [DeliveryRouteController::class, 'update'])->name('route_update');
    Route::post('/route/delete', [DeliveryRouteController::class, 'delete'])->name('route_delete');

    // ルートのAjax通信
    Route::get('/route/list', [DeliveryRouteAjaxController::class, 'sendRouteList'])->name('route_list');
    Route::get('/route/modal/{id}', [DeliveryRouteAjaxController::class, 'sendRouteModal'])->name('route_modal');

    // 配達管理画面
    Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery_index');
});
