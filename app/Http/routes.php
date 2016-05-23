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

Route::get('/', function () {
    return view('welcome');
});

//Users
Route::get('users', 'UserController@index');
Route::get('users/create', [
    'as' => 'users.create',
    'uses' => 'UserController@getCreate',
]);
Route::post('users/create', 'UserController@postCreate');

Route::get('users/edit/{id}', ['as' => 'users.edit',
    'uses' => 'UserController@getEdit', ]);

Route::post('users/edit/{id}', 'UserController@postEdit');
Route::post('users/delete/{id}', [
    'as' => 'users.delete',
    'uses' => 'UserController@postDelete',
]);

//Products
Route::get('products', 'ProductController@index');
Route::get('products/create', [
    'as' => 'products.create',
    'uses' => 'ProductController@getCreate',
]);
Route::post('products/create', 'ProductController@postCreate');

Route::get('products/edit/{id}', ['as' => 'products.edit',
    'uses' => 'ProductController@getEdit', ]);

Route::post('products/edit/{id}', 'ProductController@postEdit');
Route::post('products/delete/{id}', [
    'as' => 'products.delete',
    'uses' => 'ProductController@postDelete',
]);
