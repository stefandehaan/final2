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

Auth::routes(['register' => false, 'verify' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('consults', 'ConsultController');
    Route::resource('diseases', 'DiseaseController');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('clients', 'ClientController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('prescriptions', 'PrescriptionController');
    Route::resource('insurers', 'InsurersController');
    Route::resource('treatments', 'TreatmentsController');
    Route::resource('medicine', 'MedicineController');
    Route::resource('getDiseases', 'GetDiseasesController');

    Route::resource('beds', 'BedController');
    Route::resource('departments', 'DepartmentController');
    Route::resource('bedusage', 'BedusageController');


    Route::get('/user/info/{id}', 'UserController@createInfo')
        ->name('create.info.client');
    Route::post('/user/info/{id}', 'UserController@storeInfo')
        ->name('store.info.client');
});
