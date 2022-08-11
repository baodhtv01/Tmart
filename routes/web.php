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
    });

});
Route::get('/', 'dashboardController@frontend')->name('admin.dashboard');

