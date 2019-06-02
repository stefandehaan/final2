<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('consults', 'ConsultController');
    Route::resource('diseases', 'DiseaseController');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('clients', 'ClientController');

    Route::get('/user/info/{id}', 'UserController@createInfo')
        ->name('create.info.client');
    Route::post('/user/info/{id}', 'UserController@storeInfo')
        ->name('store.info.client');
});
