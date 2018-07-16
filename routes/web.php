<?php
use App\Customer\Models\User;
use App\System\Models\User as SystemUser;
/*use Hyn\Tenancy\Models\Customer;

Route::get('customers', function () {
    return Customer::all();
});*/


    Auth::routes();
    Route::get('/', function()
{
	return view('welcome');
});
Route::get('all-users', function () {
    return User::all();
});
Route::get('users','SystemController@getUserData');
Route::get('users/{id}','SystemController@getUserById');
Route::get('customers/{database}','SystemController@getTenantData');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('websites', 'SystemController@getWebsiteData');
Route::get('deletecustomers/{database}/{id}','SystemController@deleteTenantData');
Route::get('customers/{database}/{id}','SystemController@getSpecificCustomerData');
Route::get('getCustomersByPosts/{database}/{id}','SystemController@getUserByPost');

Route::get('createUser/{database}/{name}/{email}/{password}','SystemController@createCustomers');

Route::get('posts/{database}','SystemController@getPostData');

Route::get('deleteposts/{database}/{id}','SystemController@deletePosts');

Route::get('posts/{database}/{id}','SystemController@getPostById');

Route::get('createPosts/{database}/{user_id}/{name}/{body}', 'SystemController@createPosts');

Route::get('updateUsers/{database}/{id}/{name}/{email}/{password}','SystemController@updateUsers');

Route::get('updatePosts/{database}/{id}/{name}/{body}','SystemController@updatePosts');

