<?php

// Route::group(['middleware' => 'role'], function() {
	Route::get('users/', ['as' => 'users.dashboard', 'uses' => 'UsersController@dashboard']);
	Route::get('users/{username}', ['as' => 'users.show', 'uses' => 'UsersController@show']);
// });