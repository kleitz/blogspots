<?php

// Route::group(['middleware' => 'role'], function() {
	Route::get('registers/', ['as' => 'registers', 'uses' => 'RegistersController@show']);
	Route::post('registers/', ['as' => 'registers', 'uses' => 'RegistersController@doLogin']);

	Route::get('registers/create', ['as' => 'registers.create', 'uses' => 'RegistersController@registration']);
	Route::post('registers/store', ['as' => 'registers.store', 'uses' => 'RegistersController@store']);
	
	Route::get('registers/login/{provider}/{auth?}', ['as' => 'registers.login', 'uses' => 'RegistersController@socialLogin']);
	
	Route::get('logout', ['uses' => 'RegistersController@logout']);
// });