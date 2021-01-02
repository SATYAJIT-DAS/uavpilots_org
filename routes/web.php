<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\User\UserController;

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
Route::get('/userdata', 'FrontendController@getBasicData')->name('userdata');
Route::get('/{slug}', 'FrontendController@singleUser')->where('slug', '^((?!login|admin|api|check-user-name-availability|edit-profile|email|home|password|register|userdata).)*$')->name('profile');
// Route::post('/{slug}', 'FrontendController@singleUser')->where('slug', '^((?!login|admin|api|check-user-name-availability|edit-profile|email|home|password|register|userdata).)*$')->name('profile');
Route::post('/check-user-name-availability', 'AjaxController@checkusername');
Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth', 'verified'], 'namespace' => 'User'], function () {
    Route::get('/home', 'UserController@index')->name('user.home');
    Route::get('/edit-profile/{id}', 'UserController@editProfile')->name('user.editProfileView');
    Route::post('edit-profile/{id}', 'UserController@updateProfile')->name('user.updateuser');
});
Route::prefix('/admin')->namespace("Admin")->group(function () {
    Route::get('/', 'AdminLoginController@loginView')->name('admin.login');
    Route::post('/', 'AdminLoginController@login');
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('settings', 'AdminController@settings')->name('admin.settings');
        Route::get('page-settings', 'SettingsController@index')->name('admin.pagesettings');
        Route::post('page-settings', 'SettingsController@updatePageSettings')->name('admin.updatepagesettings');

        Route::get('industry-list', 'SettingsController@industryList')->name('admin.industrylist');
        Route::post('remove-industry', 'AdminController@removeIndustry')->name('admin.removeindustry');

        Route::post('check-current-pwd', 'AdminController@chkCurrentPwd');
        Route::post('update-pwd', 'AdminController@updatePwd');
        Route::post('update-profile-img', 'AdminController@updateProfileimg')->name('admin.profile.img');
        Route::get('logout', 'AdminController@logout')->name('admin.logout');
        Route::get('pending-user-data', 'AdminController@pendingUserData')->name('admin.pendinguserdata');
        Route::get('active-user-data', 'AdminController@activeUserData')->name('admin.activeuserdata');
        Route::get('user-update/{id}', 'AdminController@UpdateUserView')->name('admin.updateuserview');
        Route::post('user-update/{id}', 'AdminController@UpdateUser')->name('admin.updateuser');
        Route::post('approve-user', 'AdminController@approveUser')->name('admin.approveuser');
        Route::post('unpublish-user', 'AdminController@unpublishUser')->name('admin.unpublishuser');
        Route::post('remove-user', 'AdminController@removeUser')->name('admin.deleteuser');
    });
});
