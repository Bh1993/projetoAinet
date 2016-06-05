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


Route::get('/', 'MainController@getHome');

Route::post('users-orderBy', ['as' => 'users-orderBy',
    'uses' => 'UserController@orderBy']);

Route::get('users-all', 'MainController@getAllUsers');

Route::get('farmersmarket/users/show/{id}', ['as' => 'farmersmarket.user-profile',
    'uses' => 'MainController@getUserProfile', ]);

Route::get('farmersmarket/my-profile/show/{id}', ['as' => 'farmersmarket.user-myprofile',
    'uses' => 'MainController@getMyProfile', ]);

Route::get('farmersmarket/edit-profile/{id}', [                 // Edit users, each user can edit himself
    'as' => 'farmersmarket.user-edit-profile',
    'uses' => 'MainController@getEditProfile', ]);

Route::get('farmersmarket/advertisements/show/{id}', ['as' => 'farmersmarket.advertisement-profile',
    'uses' => 'MainController@getAdvertisementProfile', ]);

Route::get('users-view', 'MainController@getUsers');
Route::get('farmersmarket', 'MainController@getHome');
Route::get('users-toprated', 'MainController@getTopRatedUsers');
Route::get('users-topsellers', 'MainController@getTopSellers');

Route::get('advertisements-all', 'MainController@getAllAdvertisements');
Route::get('advertisements-mostrecent', 'MainController@getRecentAdvertisements');
/*
Route::get('advertisements-bestsellers', 'MainController@getMostSoldAdvertisements');
Route::get('advertisements-mostviewed', 'MainController@getMostViewedAdvertisements');
Route::get('advertisements-toprated', 'MainController@getTopRatedAdvertisements');
*/
Route::get('advertisements', 'AdvertisementController@index');      // Every person can see advertisements

Route::get('advertisements/show/{id}', ['as' => 'advertisements.display-advertisement', // Every person can see details
    'uses' => 'AdvertisementController@getShow', ]); 

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::auth();

// Login & Register Group
Route::group(['middleware' => 'auth'], function () {

   Route::get('advertisements/create', [                               // Only users can create ads
    'as' => 'advertisements.create',
    'uses' => 'AdvertisementController@getCreate',
    ]);

    Route::post('advertisements/create', 'AdvertisementController@postCreate');     // Post create ads

    Route::get('advertisements/edit/{id}', [                            // Each user can edit it's ads
        'as' => 'advertisements.edit',
        'uses' => 'AdvertisementController@getEdit', ]);

    Route::post('advertisements/edit/{id}', 'AdvertisementController@postEdit');    // Post edit ads

    Route::post('advertisements/delete/{id}', [                         // Each user can delete it's ads
        'as' => 'advertisements.delete',
        'uses' => 'AdvertisementController@postDelete',
    ]);
    
});

Route::group(['middleware' => 'admin'], function() { // Admin Route

    Route::get('users', 'UserController@index');     // List users as Admin
    Route::get('advertisements', 'AdvertisementController@index');

    Route::get('users/create', [                // View to create users as admin
        'as' => 'users.create',
        'uses' => 'UserController@getCreate',
    ]);

    Route::post('users/create', 'UserController@postCreate'); // Create users as admin

    Route::get('users/edit/{id}', [                 // Edit users, each user can edit himself
    'as' => 'users.edit',
    'uses' => 'UserController@getEdit', ]);

    Route::post('users/edit/{id}', [                // Post Edit users
        'as' => 'users.edit',
        'uses' => 'UserController@postEdit', ]);

    Route::post('users/delete/{id}', [              // Post Delete users, only admin can delete users
        'as' => 'users.delete',
        'uses' => 'UserController@postDelete',
    ]);

});

    

    Route::get('users/show/{id}', ['as' => 'users.display-user',        // User profile, everyone can see 
    'uses' => 'UserController@getShow', ]);



    Route::get('users/show/{id}/bids', ['as' => 'users.display-bids',   // User bids, each user can see it's own bids
    'uses' => 'UserController@getBids',]);