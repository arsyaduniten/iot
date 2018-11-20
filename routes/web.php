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

Route::get('/', 'LandingController@index')->name('home');
Route::get('/details', 'DetailsController@index')->name('details');

Route::group(['prefix'=>'backend', 'middleware' => ['auth','is_admin']], function() {
	Route::get('/', 'Backend\BackendController@index')->name('backend:home');
	Route::resource('/sns', 'Backend\SnsController')->names([
        'index' => 'backend:sns',
        'store' =>'backend:sns:store',
        'edit' =>'backend:sns:edit',
        'update' => 'backend:sns:update',
        'destroy' => 'backend:sns:destroy'
    ]);

    Route::resource('/education', 'Backend\EducationController')->names([
        'index' => 'backend:educations',
        'store' =>'backend:education:store',
        'edit' =>'backend:education:edit',
        'update' => 'backend:education:update',
        'destroy' => 'backend:education:destroy'
    ]);

    Route::resource('/user', 'Backend\UserController')->names([
        'index' => 'backend:users',
        'store' =>'backend:user:store',
        'edit' =>'backend:user:edit',
        'update' => 'backend:user:update',
        'destroy' => 'backend:user:destroy'
    ]);
});


Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
