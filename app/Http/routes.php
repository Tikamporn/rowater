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

Route::group(['middleware' => 'web'], function () {
	// auth
    Route::auth();
    // root path
    Route::get('/','WebController@index');
    // customer
	    Route::get('/customer/','CustomerController@index');
	    Route::get('/customer/add','CustomerController@create');
	    Route::post('/customer/addAction','CustomerController@createAction');
	    Route::get('/customer/edit/{id}','CustomerController@store');
	    Route::post('/customer/editAction','CustomerController@storeAction');
	    Route::get('/customer/map/{id}','CustomerController@showMap');
	    Route::get('customer/request','MobileController@request');
	    Route::post('customer/requestAction','MobileController@requestAction');
	// product
	    Route::get('/product/','ProductController@index');
	    Route::get('/product/add','ProductController@create');
	    Route::post('/product/addAction','ProductController@createAction');
	    Route::get('/product/edit/{id}','ProductController@store');
	    Route::post('/product/editAction','ProductController@storeAction');
	    Route::any('/product/delete/{id}','ProductController@detroy');
	 // delivery
	    Route::get('/delivery/','BusinessController@index');
	    Route::post('/delivery/search','BusinessController@search');
	    Route::get('/delivery/location/{id}','BusinessController@location');
	 // Mobile
	    Route::post('/mobile/getAll','MobileController@getAll');
	    Route::post('/mobile/getCustomer','MobileController@getCustomer');
	    Route::post('/mobile/login','MobileController@logIn');
	    Route::post('/mobile/getuser','MobileController@getUser');
	 // team
	    Route::get('/team/','TeamController@index');
	 // business
	    Route::get('/purchase/','BusinessController@show');
	    Route::get('/sales/','BusinessController@create');
	    Route::post('/sales/create','BusinessController@createAction');
	    Route::get('/purchase/request','BusinessController@request');
	    Route::any('/purchase/requestAction/{id}','BusinessController@requestAction');


	 // test
	    Route::get('/mobile/test','MobileController@test');
});
