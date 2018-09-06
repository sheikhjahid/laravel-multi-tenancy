<?php
use App\Customer\Models\User;
use App\System\Models\User as SystemUser;


    Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/', function()
	{
		return view('welcome');
	});
	Route::get('all-users', function () {
		return User::all();
	});
	Route::get('users','SystemController@getUserData');
	Route::get('users/{id}','SystemController@getUserById');
	Route::get('websites', 'SystemController@getWebsiteData');


Route::group(['middleware' => 'tenant_database_name'], function()
{
	Route::get('customers/{database}','SystemController@getUserData');

	Route::get('customers/{database}/{id}','SystemController@getUserById');

	Route::get('createUsers/{database}','SystemController@createCustomers');
	Route::post('updateCustomers/{database}/{id}','SystemController@updateCustomers');

	Route::get('deleteCustomers/{database}/{id}','SystemController@deleteCustomers');

	Route::get('posts/{database}','SystemController@getAllPosts');
	Route::get('posts/{database}/{id}','SystemController@getPostsById');



});	