<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::group(['middleware' => 'auth'], function () {
    Route::auth();
}
*/
Route::get('/', function () {
    return view('farmersmarket.farmersmarket');
});

Route::get('users-view', 'GuestController@getUsers');
Route::get('farmersmarket', 'GuestController@getHome');
Route::get('users-toprated', 'GuestController@getTopRatedUsers');
Route::get('users-topsellers', 'GuestController@getTopSellers');


// Login & Register Group
/*Route::group(['login' => 'auth'], function () {
    Route::get('login', 'AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
}*/

//Users
Route::get('users', 'UserController@index');
Route::get('users/create', [
    'as' => 'users.create',
    'uses' => 'UserController@getCreate',
]);
Route::post('users/create', 'UserController@postCreate');

Route::get('users/edit/{id}', [
    'as' => 'users.edit',
    'uses' => 'UserController@getEdit', ]);

Route::post('users/edit/{id}', [
    'as' => 'users.edit',
    'uses' => 'UserController@postEdit', ]);

Route::post('users/delete/{id}', [
    'as' => 'users.delete',
    'uses' => 'UserController@postDelete',
]);

Route::get('users/show/{id}', ['as' => 'users.display-user',
    'uses' => 'UserController@getShow', ]);



//advertisements

Route::get('advertisements', 'AdvertisementController@index');

Route::get('advertisements/create', [
    'as' => 'advertisements.create',
    'uses' => 'AdvertisementController@getCreate',
]);
Route::post('advertisements/create', 'AdvertisementController@postCreate');

Route::get('advertisements/edit/{id}', [
    'as' => 'advertisements.edit',
    'uses' => 'AdvertisementController@getEdit', ]);

Route::post('advertisements/edit/{id}', 'AdvertisementController@postEdit');

Route::post('advertisements/delete/{id}', [
    'as' => 'advertisements.delete',
    'uses' => 'AdvertisementController@postDelete',
]);
