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


Route::group(['middleware' =>['allowed']], function() {
    Route::get('/', 'MainController@getHome');
    
    Route::get('users-all', 'MainController@getAllUsers');






Route::get('search', ['as' => 'farmersmarket.search', 'uses' => 'MainController@getSearch' ]);

Route::post('users-orderBy', ['as' => 'users-orderBy',
    'uses' => 'UserController@orderBy']);

Route::post('advertisements-orderBy', ['as' => 'advertisements-orderBy',
    'uses' => 'AdvertisementController@orderBy']);

Route::post('advertisements-all-orderBy', ['as' => 'advertisements-all-orderBy',
    'uses' => 'MainController@orderByProducts']);

Route::get('farmersmarket/edit-advertisement/{id}', [                            // Each user can edit it's ads
        'as' => 'farmersmarket.edit-advertisement',
        'uses' => 'MainController@getEdit', ]);

Route::post('farmersmarket/edit-advertisement/{id}', [
        'as' => 'farmersmarket.edit-advertisement',
        'uses' => 'MainController@postEdit']);

 Route::post('farmersmarket/delete-advertisement/{id}', [                         // Each user can delete it's ads
        'as' => 'farmersmarket.delete-advertisement',
        'uses' => 'MainController@postDelete',
    ]);


Route::post('users-all-orderBy', ['as' => 'users-all-orderBy',
    'uses' => 'MainController@orderBy']);

Route::get('farmersmarket/users/show/{id}', ['as' => 'farmersmarket.user-profile',
    'uses' => 'MainController@getUserProfile', ]);

Route::get('farmersmarket/offers/show/{id}', ['as' => 'farmersmarket.offer-profile',
    'uses' => 'MainController@getOfferProfile', ]);

Route::get('farmersmarket/offers-details/show/{id}', ['as' => 'farmersmarket.offer-details',
    'uses' => 'MainController@getOfferDetails', ]);

Route::get('farmersmarket/my-profile/show/{id}', ['as' => 'farmersmarket.user-myprofile',
    'uses' => 'MainController@getMyProfile', ]);

Route::get('farmersmarket/my-advertisements/show/{id}', ['as' => 'farmersmarket.user-my-advertisements',
    'uses' => 'MainController@getUserAdvertisements', ]);

Route::get('farmersmarket/my-bids/show/{id}', ['as' => 'farmersmarket.user-my-bids',
    'uses' => 'MainController@getUserbids', ]);

 Route::post('bids/accept/{id}', [ 
        'as' => 'bid.accept',
        'uses' => 'BidController@postAccept',
    ]);

 Route::post('bids/decline/{id}', [ 
        'as' => 'bid.decline',
        'uses' => 'BidController@postRefuse',
    ]);

  Route::post('bids/counter/{id}', [ 
        'as' => 'bid.counter',
        'uses' => 'BidController@postCounterOffer',
    ]);


Route::get('farmersmarket/edit-profile/{id}', [                 // Edit users, each user can edit himself
    'as' => 'farmersmarket.user-edit-profile',
    'uses' => 'MainController@getEditProfile', ]);

Route::post('farmersmarket/edit-profile/{id}', [                 // Edit users, each user can edit himself
    'as' => 'farmersmarket.user-edit-profile',
    'uses' => 'MainController@postEditProfile', ]);

Route::get('farmersmarket/advertisements/show/{id}', ['as' => 'farmersmarket.advertisement-profile',
    'uses' => 'MainController@getAdvertisementProfile',]);

Route::post('farmersmarket/advertisements/show/{id}', ['as' => 'farmersmarket.advertisement-profile',
    'uses' => 'CommentController@postCreate',]);

Route::post('farmersmarket/advertisements/show/{id}', ['as' => 'farmersmarket.advertisement-profile',
    'uses' => 'CommentController@postReply',]);

Route::post('user-create-advertisement', ['as' => 'user-create-advertisement', 
    'uses' => 'MainController@postCreate']);

Route::get('user-create-advertisement', [                               // Only users can create ads
    'as' => 'user-create-advertisement',
    'uses' => 'MainController@getCreate',
    ]);


Route::get('farmersmarket/create-bid/show/{id}', [                               // Only users can create ads
    'as' => 'create-bid',
    'uses' => 'BidController@getCreate',
    ]);

Route::post('farmersmarket/create-bid/show/{id}', ['as' => 'create-bid', 
    'uses' => 'BidController@postCreate']);



Route::get('farmersmarket/counter-offer/show/{id}', ['as' => 'farmersmarket.offers-counter-offer',
    'uses' => 'BidController@getCounterOffer', ]);


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


Route::get('users-view', 'MainController@getUsers');
Route::get('farmersmarket', 'MainController@getHome');
Route::get('users-toprated', 'MainController@getTopRatedUsers');
Route::get('users-topsellers', 'MainController@getTopSellers');

Route::get('advertisements-all', 'MainController@getAllAdvertisements');
Route::get('advertisements-mostrecent', 'MainController@getRecentAdvertisements');
Route::get('farmersmarket-market-bids', 'MainController@getAllBids');
Route::get('offers-all', 'MainController@getAllOffers');
/*
Route::get('advertisements-bestsellers', 'MainController@getMostSoldAdvertisements');
Route::get('advertisements-mostviewed', 'MainController@getMostViewedAdvertisements');
Route::get('advertisements-toprated', 'MainController@getTopRatedAdvertisements');
*/
Route::get('advertisements', 'AdvertisementController@index');      // Every person can see advertisements


Route::post('advertisements/show/{id}', ['as' => 'advertisements.display-advertisement', // Every person can see details
    'uses' => 'AdvertisementController@getShow',]); 

Route::get('bids', 'BidController@index'); 

Route::get('bids/show/{id}', ['as' => 'bids.display-bid', // Every person can see details
    'uses' => 'BidController@getShow',]); 


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

    Route::post('advertisements/edit/{id}', [
        'as' => 'advertisements.edit',
        'uses' => 'AdvertisementController@postEdit']);   // Post edit ads

    Route::post('advertisements/delete/{id}', [                         // Each user can delete it's ads
        'as' => 'advertisements.delete',
        'uses' => 'AdvertisementController@postDelete',
    ]);
    
});



Route::group(['middleware' => ['auth' , 'admin']], function() { // Admin Route

    Route::get('users', 'UserController@index');     // List users as Admin

    Route::get('advertisements', 'AdvertisementController@index');
    Route::get('comments', 'CommentController@index');
    Route::get('tags', 'TagController@index');


    Route::get('users/create', [                // View to create users as admin
        'as' => 'users.create',
        'uses' => 'UserController@getCreate',
    ]);

    Route::post('users/block/{user}', [ // admin block advertisements at dashboard
        'as' => 'users.block',
        'uses' => 'UserController@postDashboardBlock',
    ]);

    Route::post('users/admin/{user}', [ // 
        'as' => 'users.assignAdmin',
        'uses' => 'UserController@assignAdmin',
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

    Route::post('advertisements/block/{advertisement}', [ // admin block advertisements at dashboard
        'as' => 'advertisements.block',
        'uses' => 'AdvertisementController@postDashboardBlock',
    ]);

    Route::post('comments/block/{comment}', [ // admin block advertisements at dashboard
        'as' => 'comments.block',
        'uses' => 'CommentController@postDashboardBlock',
    ]);


    Route::post('tags/block/{tag}', [ // admin block advertisements at dashboard
        'as' => 'tags.block',
        'uses' => 'TagController@postDashboardBlock',
    ]);

    Route::get('users/allAdmin', [
        'as' => 'users.allAdmin', 
        'uses' => 'UserController@getAllAdmin'
        ]);


    Route::get('advertisements/allBlocked', [
    'as' => 'advertisements.allBlocked',
    'uses' => 'AdvertisementController@getAllBlocked',
    ]);

    Route::get('users/allBLocked', [ 
        'as' => 'users.allBlocked',
        'uses' => 'UserController@getAllBlocked',
    ]);

    Route::get('comments/allBLocked', [ 
        'as' => 'comments.allBlocked',
        'uses' => 'CommentController@getAllBlocked',
    ]);

    Route::get('tags/allBLocked', [ 
        'as' => 'tags.allBlocked',
        'uses' => 'TagController@getAllBlocked',
    ]);


});

    

    Route::get('users/show/{id}', ['as' => 'users.display-user',        // User profile, everyone can see 
    'uses' => 'UserController@getShow', ]);



Route::get('advertisements/show/{id}', ['as' => 'advertisements.display-advertisement',
    'uses' => 'AdvertisementController@getShow', ]);


    Route::get('users/show/{id}/bids', ['as' => 'users.display-bids',   // User bids, each user can see it's own bids
    'uses' => 'UserController@getBids',]);


Route::get('verify/{id}/email', ['as' => 'email_confirm', 'uses' => 'UserController@confirmEmail', ]);

});