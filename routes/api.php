<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});


//    Route::post('/kt_admin/APi_delivery_boy/add', 'API_Controllers\delivery_boycontroller@add');
//    Route::put('/kt_admin/APi_delivery_boy/update/7', 'API_Controllers\delivery_boycontroller@update');
   Route::post('/kt_admin/APi_delivery_boy/login', 'API_Controllers\delivery_boycontroller@login_delivery_boy');
//Route::get('/kt_admin/APi_delivery_boy', 'API_Controllers\delivery_boycontroller@index');

Route::group(['middleware' => 'delivery_boy:api_delivery_boy'],function () {
    Route::get('/kt_admin/APi_delivery_boy', 'API_Controllers\delivery_boycontroller@delivery_boy');
    Route::get('/kt_admin/APi_delivery_boy/pick_up', 'API_Controllers\delivery_boycontroller@delivery_boy_pick_up');
    Route::post('/kt_admin/APi_delivery_boy/single_pick_up', 'API_Controllers\delivery_boycontroller@delivery_boy_pick_up_singl');
    Route::get('/kt_admin/APi_delivery_boy/order', 'API_Controllers\delivery_boycontroller@delivery_boy_order');
    Route::get('/kt_admin/APi_delivery_boy/order/{id}', 'API_Controllers\delivery_boycontroller@delivery_boy_order_singl');
});