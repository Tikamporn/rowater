<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



// WebController
Route::group(['middleware' => 'web'], function () {
    
	Route::auth();
	Route::get('/','WebController@index');

    Route::group(['namespace' => 'Customer'], function()
    {
        //Customer
        Route::get('/customer/','CustomerController@index');
        Route::get('/customer/create','CustomerController@create');
        Route::post('/customer/createAction','CustomerController@createAction');
        Route::get('/customer/store/{id}','CustomerController@store');
        Route::post('/customer/storeAction','CustomerController@storeAction');
        Route::get('/customer/location/{id}','CustomerController@location');
    });

    Route::group(['namespace' => 'CustomerRequest'], function()
    {
        //Customer Request
        Route::get('customer/request','CustomerRequestController@request');
        Route::post('customer/requestAction','CustomerRequestController@requestAction');
        Route::get('customer/requestlist','CustomerRequestController@index');
    });

    // ProductController
    Route::group(['namespace' => 'Product'], function()
    {
        Route::get('/product/','ProductController@index');
        Route::get('/product/create','ProductController@create');
        Route::post('/product/createAction','ProductController@createAction');
        Route::get('/product/store/{id}','ProductController@store');
        Route::post('/product/storeAction','ProductController@storeAction');
        Route::any('/product/delete/{id}','ProductController@delete');
    });

    // TeamController
    Route::group(['namespace' => 'Team'], function()
    {
        Route::get('/team/','TeamController@index');
        Route::get('/team/member/{id}','TeamController@member');
        Route::get('/team/create','TeamController@create');
        Route::post('/team/createAction','TeamController@createAction');
        Route::get('/team/delete/team/{id}','TeamController@delete');
        Route::get('/team/delete/zone','TeamController@zonedelete');
        Route::get('/team/delete/member','TeamController@memberdelete');
        Route::get('/team/store/{id}','TeamController@store');
        Route::post('/team/storeAction/{id}','TeamController@storeAction');
    });

    // ZoneController
    Route::group(['namespace' => 'Zone'], function()
    {
        Route::get('/zone/','ZoneController@index');
        Route::get('/zone/create','ZoneController@create');
        Route::post('/zone/createAction','ZoneController@createAction');
        Route::get('/zone/store/{id}','ZoneController@store');
        Route::post('/zone/storeAction','ZoneController@storeAction');
        Route::get('/zone/delete/{id}','ZoneController@delete');
    });
});



// Route::group(['middleware' => 'web'], function () {
// 	// auth
//     Route::auth();
//     // root path
//     Route::get('/','WebController@index');
//     // customer
//     // Route::get('/customer/','CustomerController@index');
//     // Route::get('/customer/add','CustomerController@create');
//     // Route::post('/customer/addAction','CustomerController@createAction');
//     // Route::get('/customer/edit/{id}','CustomerController@store');
//     // Route::post('/customer/editAction','CustomerController@storeAction');
//     // Route::get('/customer/map/{id}','CustomerController@showMap');
//     // Route::get('customer/request','MobileController@request');
//     // Route::post('customer/requestAction','MobileController@requestAction');

// 	// product
//     // Route::get('/product/','ProductController@index');
//     // Route::get('/product/add','ProductController@create');
//     // Route::post('/product/addAction','ProductController@createAction');
//     // Route::get('/product/edit/{id}','ProductController@store');
//     // Route::post('/product/editAction','ProductController@storeAction');
//     // Route::any('/product/delete/{id}','ProductController@detroy');

//  	// delivery
//     // Route::get('/delivery/','BusinessController@index');
//     // Route::post('/delivery/search','BusinessController@search');
//     // Route::get('/delivery/location/{id}','BusinessController@location');

//  	// Mobile
//     // Route::post('/mobile/getAll','MobileController@getAll');
//     // Route::post('/mobile/getCustomer','MobileController@getCustomer');
//     // Route::post('/mobile/login','MobileController@logIn');
//     // Route::post('/mobile/getuser','MobileController@getUser');

//  	// team
//     // Route::get('/team/','TeamController@index');
//     // Route::get('/team/member/{id}','TeamController@member');
//     // Route::get('/team/add','TeamController@create');
//     // Route::post('/team/addAction','TeamController@createAction');
//     // Route::get('/team/delete/team/{id}','TeamController@delete');
//     // Route::get('/team/delete/zone','TeamController@zonedelete');
//     // Route::get('/team/delete/member','TeamController@memberdelete');
//     // Route::get('/team/edit/{id}','TeamController@edit');
//     // Route::post('/team/editAction/{id}','TeamController@editAction');

//  	// zone
//     // Route::get('/zone/','ZoneController@index');
//     // Route::get('/zone/add','ZoneController@create');
//     // Route::post('/zone/addAction','ZoneController@createAction');
//     // Route::get('/zone/edit/{id}','ZoneController@edit');
//     // Route::post('/zone/editAction','ZoneController@editAction');
//     // Route::get('/zone/delete/{id}','ZoneController@delete');

//  	// business
//     // Route::get('/purchase/','BusinessController@show');
//     // Route::get('/sales/','BusinessController@create');
//     // Route::post('/sales/create','BusinessController@createAction');
//     // Route::get('/purchase/request','BusinessController@request');
//     // Route::any('/purchase/requestAction/{id}','BusinessController@requestAction');
// });
