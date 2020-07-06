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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/login', 'Admin\AdminController@loginView')->name('admin.loginView');
Route::post('admin/login', 'Admin\AdminController@login')->name('admin.login');

Route::group(['middleware' => ['auth']], function () {
	Route::get('admin/dashboard', 'Admin\AdminController@dashboard')->name('admin.dashboard');
	Route::get('admin/profile', 'Admin\AdminController@profile')->name('admin.profile');
	Route::post('admin/profile/update', 'Admin\AdminController@updateProfile')->name('admin.updateProfile');
	Route::post('admin/update/password', 'Admin\AdminController@updatePassword')->name('admin.updatePassword');
});

Route::get('logout', 'HomeController@logout')->name('logout');
