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

Route::group(['prefix'=>'backend', 'middleware' => 'is_admin'], function() {
	Route::get('/', 'BackendController@index');
	Route::resource('/sns', 'Backend\SnsController')->names([
        'index' => 'backend:sns',
        'store' =>'backend:sns:store',
        'edit' =>'backend:sns:edit',
        'update' => 'backend:sns:update',
        'destroy' => 'backend:sns:destroy'
    ]);

    Route::resource('/work', 'Backend\WorkController')->names([
        'index' => 'backend:works',
        'store' =>'backend:work:store',
        'edit' =>'backend:work:edit',
        'update' => 'backend:work:update',
        'destroy' => 'backend:work:destroy'
    ]);

    Route::resource('/work_asset', 'Backend\WorkAssetController')->names([
        'index' => 'backend:work_assets',
        'store' =>'backend:work_asset:store',
        'edit' =>'backend:work_asset:edit',
        'update' => 'backend:work_asset:update',
        'destroy' => 'backend:work_asset:destroy'
    ]);

    Route::resource('/education', 'Backend\EducationController')->names([
        'index' => 'backend:educations',
        'store' =>'backend:education:store',
        'edit' =>'backend:education:edit',
        'update' => 'backend:education:update',
        'destroy' => 'backend:education:destroy'
    ]);
});

