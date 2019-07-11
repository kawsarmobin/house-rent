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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    /* Users */
    Route::resource('/users', 'Admin\UserController', ['as' => 'admin']);
    /* permissions */
    Route::get('/user-permissions/admin-or-not/{user}', 'Admin\UserController@adminOrNot')->name('user.permissions.admin-or-not');
    Route::get('/user-permissions/status/{user}', 'Admin\UserController@status')->name('user.permissions.status');
    Route::get('/user-permissions/verified/{user}', 'Admin\UserController@verified')->name('user.permissions.verified');
    /* User personal info */
    Route::resource('/user.personal-info', 'Admin\UserPersonalInfoControllers', ['as' => 'admin']);
    /* House type */
    Route::resource('/house-type', 'Admin\HouseTypesController', ['as' => 'admin'])->except(['create', 'show']);
    /* Rent type */
    Route::resource('/rent-type', 'Admin\RentTypesController', ['as' => 'admin'])->except(['create', 'show']);
    /* House Info */
    Route::resource('/house-info', 'Admin\HouseInfosController', ['as' => 'admin']);
    Route::get('/house-info/{house_info}/approval', 'Admin\HouseInfosController@approval')->name('admin.house-info.approval');
    /* House Image */
    Route::resource('house.image', 'Admin\HouseImagesController', ['as' => 'admin'])->only(['create', 'store', 'destroy']);
});