<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'FrontendController@homepage')->name('homepage');
// Route::get('/blog', 'FrontendController@blog')->name('blog');
// Route::get('/singlepage', 'FrontendController@singlepage')->name('singlepage');
Auth::routes();
Route::group(['middleware' => 'auth', 'namespace' => 'User'], function () {
    Route::get('/home', 'UserController@index')->name('user.home');
});

Route::prefix('/admin')->namespace("Admin")->group(function () {
    Route::get('/', 'AdminController@loginView')->name('admin.login');
    Route::post('/', 'AdminController@login');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('settings', 'AdminController@settings')->name('admin.settings');
        Route::post('check-current-pwd', 'AdminController@chkCurrentPwd');
        Route::post('update-pwd', 'AdminController@updatePwd');
        Route::post('update-profile-img', 'AdminController@updateProfileimg')->name('admin.profile.img');
        Route::get('logout', 'AdminController@logout')->name('admin.logout');
    });
});
