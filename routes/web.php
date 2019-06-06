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

//test Routes
    Route::group(['middleware' => 'web'], function () {
        Route::resource('test', 'TestController');
        Route::post('test/{id}/update', '\App\Http\Controllers\TestController@update');
        Route::get('test/{id}/delete', '\App\Http\Controllers\TestController@destroy');
        Route::get('test/{id}/deleteMsg', '\App\Http\Controllers\TestController@DeleteMsg');
    });

//materialize Routes
    Route::group(['middleware' => 'web'], function () {
        Route::resource('materialize', 'MaterializeController');
        Route::post('materialize/{id}/update', '\App\Http\Controllers\MaterializeController@update');
        Route::get('materialize/{id}/delete', '\App\Http\Controllers\MaterializeController@destroy');
        Route::get('materialize/{id}/deleteMsg', '\App\Http\Controllers\MaterializeController@DeleteMsg');
    });

//test_v2 Routes
    Route::group(['middleware' => 'web'], function () {
        Route::resource('test_v2', 'Test_v2Controller');
        Route::post('test_v2/{id}/update', '\App\Http\Controllers\Test_v2Controller@update');
        Route::get('test_v2/{id}/delete', '\App\Http\Controllers\Test_v2Controller@destroy');
        Route::get('test_v2/{id}/deleteMsg', '\App\Http\Controllers\Test_v2Controller@DeleteMsg');
    });
});

//another_test Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('another_test','\App\Http\Controllers\Another_testController');
  Route::post('another_test/{id}/update','\App\Http\Controllers\Another_testController@update');
  Route::get('another_test/{id}/delete','\App\Http\Controllers\Another_testController@destroy');
  Route::get('another_test/{id}/deleteMsg','\App\Http\Controllers\Another_testController@DeleteMsg');
});

Route::group(['middleware'=> 'web'],function(){
});
