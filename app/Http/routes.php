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
/*Route::get('/', function () {
    return view('farmersmarket.farmersmarket');
});
*/
Route::get('/', 'MainController@getHome');


Route::get('users-all', 'MainController@getAllUsers');
Route::get('farmersmarket/users/show/{id}', ['as' => 'farmersmarket.user-profile',
    'uses' => 'MainController@getUserProfile', ]);
Route::get('farmersmarket/advertisements/show/{id}', ['as' => 'farmersmarket.advertisement-profile',
    'uses' => 'MainController@getAdvertisementProfile', ]);
Route::get('users-view', 'MainController@getUsers');

Route::get('farmersmarket', 'MainController@getHome');
Route::get('users-toprated', 'MainController@getTopRatedUsers');
Route::get('users-topsellers', 'MainController@getTopSellers');

Route::get('advertisements-all', 'MainController@getAllAdvertisements');
Route::get('advertisements-bestsellers', 'MainController@getMostSoldAdvertisements');
Route::get('advertisements-mostviewed', 'MainController@getMostViewedAdvertisements');
Route::get('advertisements-toprated', 'MainController@getTopRatedAdvertisements');

/* Route::get('login', 'AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
   
    
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@postRegister');
*/
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::auth();

// Login & Register Group
Route::group(['middleware' => 'auth'], function () {
   Route::get('users', 'UserController@index');
    
});

Route::group(['middleware' => 'admin'], function() {
    
        Route::get('users/create', [
        'as' => 'users.create',
        'uses' => 'UserController@getCreate',
    ]);
});

//Users
//Route::get('users', 'UserController@index');

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

Route::get('users/show/{id}/bids', ['as' => 'users.display-bids',
    'uses' => 'UserController@getBids',]);



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

Route::get('advertisements/show/{id}', ['as' => 'advertisements.display-advertisement',
    'uses' => 'AdvertisementController@getShow', ]);