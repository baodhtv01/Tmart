<?php

use Illuminate\Support\Facades\Route;

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
DEFINE('ADMIN_PANEL_PATH', 'admin');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin group routes
Route::group(['prefix' => ADMIN_PANEL_PATH, 'middleware' => ['auth','IsAdmin']], function () {
   Route::get('/', 'dashboardController@index')->name('admin.dashboard');

   //users group routes
    Route::group(['prefix' => 'users'], function () {
         Route::get('/user-admin', 'UserController@indexAdmin')->name('admin.index');
         Route::get('/user-user', 'UserController@indexUser')->name('user.index');
         Route::get('/user-create', 'UserController@create')->name('user.create');
         Route::post('/user-store', 'UserController@store')->name('user.store');
         Route::get('/user-lock/{id}', 'UserController@lock')->name('user.lock');
         Route::get('/user-unlock/{id}', 'UserController@unlock')->name('user.unlock');
         Route::get('/user-info/{id}', 'UserController@info')->name('user.info');
         Route::post('/user-change/{id}', 'UserController@changeInfomation')->name('user.change');
         Route::post('/user-change-avt/{id}', 'UserController@changeAvt')->name('user.changeAvt');
         Route::get('/user-change-pass/{id}', 'UserController@changePassword')->name('user.changePass');
         Route::post('/user-change-pass/{id}', 'UserController@changePasswordStore')->name('user.changePassStore');
         //delete user
        Route::post('/user-delete', 'UserController@destroy')->name('user.delete');
    });

});
Route::get('/', 'dashboardController@frontend')->name('admin.dashboard');
//get all provinces
Route::post('/provinces', 'LocationController@getProvinces')->name('provinces');
//get all districts of a province
Route::post('/districts', 'LocationController@getDistricts')->name('districts');
//get all wards of a district
Route::post('/wards', 'LocationController@getWards')->name('wards');

