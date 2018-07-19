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
	Route::get('customers/{database}','SystemController@getTenantData');

	Route::get('deletecustomers/{database}/{id}','SystemController@deleteTenantData');
	Route::get('customers/{database}/{id}','SystemController@getSpecificCustomerData');
	Route::get('getCustomersByPosts/{database}/{id}','SystemController@getUserByPost');

	Route::post('createUser/{database}','SystemController@createCustomers');

	Route::get('posts/{database}','SystemController@getPostData');

	Route::get('deleteposts/{database}/{id}','SystemController@deletePosts');

	Route::get('posts/{database}/{id}','SystemController@getPostById');

	Route::post('createPosts/{database}', 'SystemController@createPosts');

	Route::post('updateUsers/{database}/{id}','SystemController@updateUsers');

	Route::post('updatePosts/{database}/{id}','SystemController@updatePosts');


});	