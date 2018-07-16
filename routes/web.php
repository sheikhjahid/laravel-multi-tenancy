<?php
use App\Customer\Models\User;
use App\System\Models\User as SystemUser;
/*use Hyn\Tenancy\Models\Customer;

Route::get('customers', function () {
    return Customer::all();
});*/

Route::group(['middleware' => 'tenancy.enforce'], function () 
{
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
Route::get('customers/{database}/{id}','SystemController@getSpecificTenantData');
});

