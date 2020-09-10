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

Route::get('/','DashboardController@index')->name('dashboard');
Route::get('profile/complete', 'UserController@profile')->name('profile')->middleware(['auth', 'completed']);
Route::put('profile/update/{id}', 'UserController@updateProfile')->name('updateProfile')->middleware('auth');
Route::put('profile/edit/{id}', 'UserController@editProfile')->name('editProfile')->middleware('auth');
Route::get('profile/show', 'UserController@showProfile')->name('showProfile')->middleware('auth');
Route::delete('profile/delete/{id}', 'UserController@deleteProfile')->name('deleteProfile')->middleware('auth');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('getData/{id}', 'TestController@getData')->name('getData')->middleware('auth');
Route::post('/filter/{id}/{color}','FilterController@changeColor')->middleware('auth');
Route::post('/filter/background/{id}/{color}','FilterController@changeBackground')->middleware('auth');
Route::resource('test' , 'TestController');

Route::name('admin')->namespace('Admin')->prefix('admin')->middleware('admin')->group(function () {	
Route::get('/','DashboardController@index')->name('home');
Route::post('/user/type/{id}/{type}','UserController@type')->name('user.active')->middleware('auth');
Route::get('/user/favorite', 'UserController@favoriteUser')->name('user.favoriteUser')->middleware('auth');
Route::post('/user/favorite/{id}/{status}','UserController@favorite')->name('user.favorite')->middleware('auth');
Route::resource('user', 'UserController');
});

Route::name('blogger')->namespace('Blogger')->prefix('blogger')->middleware('blogger')->group(function () {	
Route::get('/','DashboardController@index')->name('blogger');
Route::resource('blog', 'BlogsController');
});

Auth::routes();