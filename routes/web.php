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

use Illuminate\Http\Request;

Route::get('/', function () {
  return view("welcome");
});

Route::group(array('prefix' => 'admin'), function() {
    // Route::get('/', 'AdminController@index');
    // Route::get('/catalogus/', 'PageController@catalogus');
    Auth::routes();
    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/', 'Auth\LoginController@login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/dashboard/', 'AdminController@dashboard');
    Route::get('/user/verify/{token}', 'AdminController@verify');
    Route::get('/user/resendemail', 'AdminController@resendemail');

});
