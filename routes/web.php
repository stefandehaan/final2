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
    Route::resource('images', 'ImageController');


//    Route::view('profile', 'profile')->name('profile');
//    Route::get('profile', 'ProfileController');





    Route::get('/user/info/{id}', 'UserController@createInfo')
        ->name('create.info.client');
    Route::post('/user/info/{id}', 'UserController@storeInfo')
        ->name('store.info.client');

    Route::get('/insurer/info/{id}', 'UserController@createInsurance')
        ->name('create.info.insurer');
    Route::post('/insurer/info/{id}', 'UserController@storeInsurance')
        ->name('store.info.insurer');


});

//
//Route::get('create','ImageController@create');
//Route::post('create','ImageController@store');

//Route::group(['middleware'=> 'web'],function(){
//});
//
//Route::group(['middleware'=> 'web'],function(){
//});
////album Routes
//Route::get('/', array('as' => 'index','uses' => 'AlbumController@getList'));
//Route::get('/createalbum', array('as' => 'create_album_form','uses' => 'AlbumsController@getForm'));
//Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@postCreate'));
//Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete'));
//Route::get('/album/{id}', array('as' => 'show_album','uses' => 'AlbumsController@getAlbum'));
//
////image Routes
//Route::group(['middleware'=> 'web'],function(){
//  Route::resource('image','\App\Http\Controllers\ImageController');
//  Route::post('image/{id}/update','\App\Http\Controllers\ImageController@update');
//  Route::get('image/{id}/delete','\App\Http\Controllers\ImageController@destroy');
//  Route::get('image/{id}/deleteMsg','\App\Http\Controllers\ImageController@DeleteMsg');
//});


