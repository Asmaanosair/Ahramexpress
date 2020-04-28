<?php

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(["middleware"=>['auth']],function (){
/******************************************************
 * ***************** Admin Panel***************************
 *****************************************************/

Route::get('/kt_admin/dashboard','dashboardcontroller@index' );

/***********************************************************
 ***************** Services ******************************
 ************************************************************/
Route::get('/kt_admin/service','servicecontroller@index') ;
Route::post('/kt_admin/add_service','servicecontroller@add') ;
Route::post('/kt_admin/up_service/{id}','servicecontroller@update') ;
Route::get('/kt_admin/del_service/{id}','servicecontroller@delete') ;
/***********************************************************
 ***************** End Services ******************************
 ************************************************************/


    /***********************************************************
      ***************** Delivery ******************************
     ************************************************************/
    Route::get('/kt_admin/delivery','deliverycontroller@index') ;
    Route::post('/kt_admin/add_delivery','deliverycontroller@add') ;
    Route::post('/kt_admin/up_delivery/{id}','deliverycontroller@update') ;
    Route::get('/kt_admin/del_delivery/{id}','deliverycontroller@delete') ;
    /***********************************************************
      ***************** End Delivery ******************************
     ************************************************************/
/***********************************************************
 *****************  Other Options ******************************
 ************************************************************/
Route::get('/kt_admin/option','optioncontroller@index') ;
Route::post('/kt_admin/add_option','optioncontroller@add') ;
Route::post('/kt_admin/up_option/{id}','optioncontroller@update') ;
Route::get('/kt_admin/del_option/{id}','optioncontroller@delete') ;
/***********************************************************
 ***************** End Other Options **********************
 ************************************************************/


/***********************************************************
 *****           Sections Of Other Options              ****
 ************************************************************/
Route::get('/kt_admin/section','sectioncontroller@index') ;
Route::post('/kt_admin/add_section','sectioncontroller@add') ;
Route::get('/kt_admin/show_section/{id}','sectioncontroller@show') ;
Route::post('/kt_admin/up_section/{id}','sectioncontroller@update') ;
Route::get('/kt_admin/del_section/{id}','sectioncontroller@delete') ;
/***********************************************************
 ***        End  Sections Of Other Options              ****
 ************************************************************/

/***********************************************************
 *****                    Receive                   ****
 ************************************************************/
Route::get('/kt_admin/receive ','receivecontroller@index') ;
Route::post('/kt_admin/add_receive','receivecontroller@add') ;
Route::post('/kt_admin/up_receive/{id}','receivecontroller@update') ;
Route::get('/kt_admin/del_receive/{id}','receivecontroller@delete') ;
/***********************************************************
 ***                   End  Receive                    ****
 ************************************************************/


/***********************************************************
 *****                    Distance                   ****
 ************************************************************/
Route::get('/kt_admin/distance ','distancecontroller@index') ;
Route::post('/kt_admin/add_distance','distancecontroller@add') ;
Route::post('/kt_admin/up_distance/{id}','distancecontroller@update') ;
Route::get('/kt_admin/del_distance/{id}','distancecontroller@delete') ;
/***********************************************************
 ***                   End  Distance                    ****
 ************************************************************/
/***********************************************************
 *****            Distance From To             ****
 ************************************************************/

Route::post('/kt_admin/add_from_to/{id}','from_tocontroller@add') ;
Route::get('/kt_admin/show_from_to/{id}','from_tocontroller@show') ;
Route::post('/kt_admin/up_from_to/{id}','from_tocontroller@update') ;
Route::get('/kt_admin/del_from_to/{id}','from_tocontroller@delete') ;
/***********************************************************
 ***        End   Distance From To                 ****
 ************************************************************/

/***********************************************************
 *****************  Other Weight ******************************
 ************************************************************/
Route::get('/kt_admin/weight','weightcontroller@index') ;
Route::post('/kt_admin/add_weight','weightcontroller@add') ;
Route::post('/kt_admin/up_weight/{id}','weightcontroller@update') ;
Route::get('/kt_admin/del_weight/{id}','weightcontroller@delete') ;
/***********************************************************
 ***************** End  Weight ******************************
 ************************************************************/





/***********************************************************
 *****************   Vehicle ******************************
 ************************************************************/
Route::get('/kt_admin/vehicle','vehiclecontroller@index') ;
Route::post('/kt_admin/add_vehicle','vehiclecontroller@add') ;
Route::post('/kt_admin/up_vehicle/{id}','vehiclecontroller@update') ;
Route::get('/kt_admin/del_vehicle/{id}','vehiclecontroller@delete') ;
/***********************************************************
 ***************** End  Vehicle ******************************
 ************************************************************/
/***********************************************************
 ***************** Country ******************************
 ************************************************************/
Route::get('/kt_admin/country','countrycontroller@index') ;
Route::post('/kt_admin/add_country','countrycontroller@add') ;
Route::post('/kt_admin/up_country/{id}','countrycontroller@update') ;
Route::get('/kt_admin/del_country/{id}','countrycontroller@delete') ;
/***********************************************************
 ***************** End Country ******************************
 ************************************************************/


/***********************************************************
 ***************** City ******************************
 ************************************************************/
Route::get('/kt_admin/city','citycontroller@index') ;
Route::get('/kt_admin/show_city/{id}','citycontroller@show') ;
Route::post('/kt_admin/add_city','citycontroller@add') ;
Route::post('/kt_admin/up_city/{id}','citycontroller@update') ;
Route::get('/kt_admin/del_city/{id}','citycontroller@delete') ;
Route::get('/kt_admin/active_city/{id}','citycontroller@active') ;
    Route::get('/kt_admin/notactive_city/{id}','citycontroller@notactive') ;
/***********************************************************
 ***************** End City ******************************
 ************************************************************/

/***********************************************************
 ***************** District ******************************
 ************************************************************/
Route::get('/kt_admin/district','districtcontroller@index') ;
Route::get('/kt_admin/show_district/{id}','districtcontroller@show') ;
Route::post('/kt_admin/add_district','districtcontroller@add') ;
Route::post('/kt_admin/up_district/{id}','districtcontroller@update') ;
Route::get('/kt_admin/del_district/{id}','districtcontroller@delete') ;
/***********************************************************
 ***************** End District ******************************
 ************************************************************/
 
 /***********************************************************
 ***************** orders ******************************
 ************************************************************/
Route::get('/kt_admin/order','add_ordercontroller@index') ;
Route::post('/kt_admin/add_order','add_ordercontroller@add') ;
Route::post('/kt_admin/up_order/{id}','add_ordercontroller@update') ;
Route::post('/kt_admin/up_order_boy/{id}','add_ordercontroller@update') ;
Route::get('/kt_admin/del_order/{id}','add_ordercontroller@delete') ;

/***********************************************************
 ***************** End orders ******************************
 ************************************************************/


    /***********************************************************
     *****************  New_orders ******************************
     ************************************************************/
    Route::get('/kt_admin/order','ordercontroller@index') ;
     Route::get('kt_admin/pdf_order','ordercontroller@pdf_order') ;
    Route::post('/kt_admin/new_order/{id}','ordercontroller@add') ;
    Route::get('/kt_admin/e_order/{id}','ordercontroller@edit') ;
    Route::post('/kt_admin/up_order/{id}','ordercontroller@update') ;
    Route::post('/kt_admin/up_order_boy/{id}','ordercontroller@up_order_status_boy') ;
     Route::get('/kt_admin/history_order/{id}','ordercontroller@history_order') ;

    /***********************************************************
     ***************** End New_orders ******************************
     ************************************************************/




    /***********************************************************
     ***************** Sub_orders ******************************
     ************************************************************/
    Route::post('/kt_admin/add_sub_order/{id}','sub_ordercontroller@add') ;
    Route::get('/kt_admin/sub_order','sub_ordercontroller@index') ;
    Route::post('/kt_admin/up_sub_order/{id}','sub_ordercontroller@update') ;
    Route::get('/kt_admin/del_sub_order/{id}','sub_ordercontroller@delete') ;
    Route::get('/kt_admin/sub_order_client/{id}','sub_ordercontroller@show_sub') ;
    Route::post('/kt_admin/up_sub_order_boy/{id}','sub_ordercontroller@up_sub_order_status_boy') ;
    Route::get('/kt_admin/e_sub_order_boy/{id}','sub_ordercontroller@edit') ;
    Route::get('/kt_admin/history_sub_order/{id}','sub_ordercontroller@history_sub_order') ;

    /***********************************************************
     ***************** End  Sub_orders ******************************
     ************************************************************/
 
 
 
    /***********************************************************
     ***************** Client ******************************
     ************************************************************/
    Route::get('/kt_admin/client','clientcontroller@index') ;
    Route::get('/kt_admin/client/{id}','clientcontroller@singl_client') ;
    Route::get('/kt_admin/c_client','clientcontroller@create') ;
    Route::POST('/kt_admin/add_client','clientcontroller@add') ;
    Route::POST('/kt_admin/add_bank/{id}','clientcontroller@add_bank') ;
    Route::POST('/kt_admin/add_account/{id}','clientcontroller@add_account') ;
    Route::POST('/kt_admin/add_attach/{id}','clientcontroller@add_attach') ;
    Route::POST('/kt_admin/add_other/{id}','clientcontroller@add_other') ;
    Route::get('/kt_admin/del_attach/{id}/{img}','clientcontroller@del_attach') ;
    Route::get('/kt_admin/del_other/{id}/{img}','clientcontroller@del_other') ;
    Route::get('/kt_admin/e_client/{id}','clientcontroller@edit') ;
    Route::post('/kt_admin/update_client/{id}','clientcontroller@update') ;
    Route::get('/kt_admin/order_client/{id}','clientcontroller@orders_show') ;

    /***********************************************************
     ***************** End Client ******************************
     ************************************************************/

    /***********************************************************
     ******            Delivery_boy           *****************
     ************************************************************/
    Route::get('/kt_admin/boy','delivery_boycontroller@index') ;
    Route::get('/kt_admin/boy/{id}','delivery_boycontroller@singl_boy') ;
    Route::get('/kt_admin/enable_boy/{id}','delivery_boycontroller@active_boy') ;
    Route::get('/kt_admin/disable_boy/{id}','delivery_boycontroller@not_active_boy') ;
    Route::post('/kt_admin/add_boy','delivery_boycontroller@add') ;
    Route::post('/kt_admin/up_boy/{id}','delivery_boycontroller@update') ;
    Route::get('/kt_admin/del_boy/{id}','delivery_boycontroller@delete') ;
    Route::get('/kt_admin/c_boy','delivery_boycontroller@create') ;
    Route::get('/kt_admin/boy_{id}/{status}','delivery_boycontroller@status') ;
    Route::get('/kt_admin/boy_sub_order{id}','delivery_boycontroller@sub_order') ;
    Route::get('/kt_admin/boy_order{id}','delivery_boycontroller@order') ;
    /***********************************************************
     *********        End  Delivery_boy                  ********
     ************************************************************/

    /***********************************************************
          ******            Status           *****************
     ************************************************************/
    Route::get('/kt_admin/status','statuscontroller@index') ;
    Route::post('/kt_admin/add_status','statuscontroller@add') ;
    Route::post('/kt_admin/up_status/{id}','statuscontroller@update') ;
    Route::get('/kt_admin/del_status/{id}','statuscontroller@delete') ;
    /***********************************************************
         *********        End  Status                  ********
     ************************************************************/



    /***********************************************************
     ******            Branch           *****************
     ************************************************************/
    Route::get('/kt_admin/branch','branchcontroller@index') ;
    Route::get('/kt_admin/c_branch','branchcontroller@create') ;
    Route::post('/kt_admin/c_branch','branchcontroller@add') ;
    Route::get('/kt_admin/get-state-list/{id}','branchcontroller@getStateList');
    Route::get('/kt_admin/get-city-list/{id}','branchcontroller@getCityList');
    //Route::post('/kt_admin/up_status/{id}','statuscontroller@update') ;
    //Route::get('/kt_admin/del_status/{id}','statuscontroller@delete') ;
    /***********************************************************
     *********        End  Branch                  ********
     ************************************************************/

    /***********************************************************
     ******          Role           *****************
     ************************************************************/
    Route::get('/kt_admin/role','rolecontroller@index') ;
    Route::post('/kt_admin/add_role','rolecontroller@add') ;
    Route::post('/kt_admin/up_role/{id}','rolecontroller@update') ;
    Route::get('/kt_admin/del_role/{id}','rolecontroller@delete') ;
    /***********************************************************
     *********        End  Role                  ********
     ************************************************************/


/****************************************************
 * ***************** End Admin Panel****************
 *****************************************************/
    Route::get('/logout',function (){
        auth()->logout();
        return view('auth.login');
    });
});



/***********************************************************
 ******            Client on Website           *****************
 ************************************************************/

Route::get('/client_login', 'Auth\login_clientcontroller@showclientLoginForm');
Route::post('/client_login', 'Auth\login_clientcontroller@client_login');

Route::get('/client_register', 'Auth\login_clientcontroller@showclientregisterForm');
Route::post('/client_register', 'Auth\login_clientcontroller@client_register');

Route::group(["middleware"=>['client']],function (){
 /******            Client    Client Account   Information         *****************/
    Route::get('/client_account', 'site_clientcontroller@index');
    Route::post('/client_account', 'site_clientcontroller@update_information');
    Route::post('/client_account/attachment', 'site_clientcontroller@add_image');
     Route::get('/client_account/attachment', 'site_clientcontroller@index');
   
      Route::get('/my-account-package','site_clientcontroller@myaccountpackage');
     
       Route::post('/client_account/other', 'site_clientcontroller@add_other');
     Route::get('/client_account/other', 'site_clientcontroller@index');
      Route::post('/client_account/bank', 'site_clientcontroller@add_account');
     Route::get('/client_account/bank', 'site_clientcontroller@index');
    
    
    
    /******          End  Client Account   Information        *****************/
    Route::get('/dashboard', 'site_clientcontroller@dashboard');
    Route::get('/pick_up', 'site_clientcontroller@pick_up');
    Route::get('/Cargo', 'site_clientcontroller@cargo');
       Route::get('/Cargo/{id}', 'site_clientcontroller@cargo2');
    Route::get('/order_system', 'site_clientcontroller@order_system');
    Route::post('/order_system', 'site_clientcontroller@order_system_add');

    Route::get('/order_system_sec', 'site_clientcontroller@order_system_sec');
    Route::post('/order_system_sec', 'site_clientcontroller@order_system_add_sec');


    Route::get('dropdownlist','DropdownController@index');
    
    Route::get('get-state-list','site_clientcontroller@getStateList');
    Route::get('get-city-list','site_clientcontroller@getCityList');

    Route::post('import', 'site_clientcontroller@import');
    Route::get('export', 'site_clientcontroller@export');
        Route::get('/invoice/{id}', 'site_clientcontroller@invoice');
    
    
     Route::get('/logout_client',function (){
        auth()->logout();
         return redirect('/client_login');
    });
    
});

/***********************************************************
 *********        End  Client on Website            ********
 ************************************************************/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
