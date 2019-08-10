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

// Route::get('/', 'LandingController@index')->name('home');
Route::get('/', 'LandingController@index_v2_default')->name('homev2');
Route::get('/profile', 'LandingController@index_v2')->name('homev2');
Route::get('/academic', 'LandingController@portfolio_v2')->name('portfoliov2');
Route::get('/research', 'LandingController@research_v2')->name('researchv2');
Route::get('/mycorner', 'LandingController@mycorner')->name('mycorner');
Route::get('/contact', 'LandingController@contact')->name('contact');
Route::get('/details', 'DetailsController@index')->name('details');
Route::get('/post', 'DetailsController@view')->name('details');

Route::view('/privacy', 'public.privacy');

Route::post('/enquiry', 'Backend\EnquiryController@store')->name('enquiry');
Route::post('/landing/enquiry', 'Backend\EnquiryController@notify')->name('landing_enquiry');

Route::group(['prefix'=>'/v2/backend', 'middleware' => ['auth','is_admin']], function(){
    Route::get('/', 'Backend\BackendController@entry')->name('entry');
    Route::get('/layout', 'Backend\BackendController@layout')->name('layout');
    Route::get('/getpage/{id}', 'Backend\BackendController@getpage')->name('getpage');
    Route::put('/update/{id}', 'Backend\BackendController@update')->name('update:page');
});

Route::group(['prefix'=>'backend', 'middleware' => ['auth','is_admin']], function() {
	Route::get('/', 'Backend\BackendController@index')->name('backend:home');
	Route::resource('/sns', 'Backend\SnsController')->names([
        'index' => 'backend:snss',
        'create' => 'backend:sns:create',
        'store' =>'backend:sns:store',
        'edit' =>'backend:sns:edit',
        'update' => 'backend:sns:update',
        'destroy' => 'backend:sns:destroy'
    ]);

    Route::resource('/enquiry', 'Backend\EnquiryController')->names([
        'destroy' => 'backend:enquiry:destroy'
    ]);

    Route::resource('/statistic', 'Backend\StatisticController')->names([
        'index' => 'backend:statistics',
        'create' => 'backend:statistic:create',
        'store' =>'backend:statistic:store',
        'edit' =>'backend:statistic:edit',
        'update' => 'backend:statistic:update',
        'destroy' => 'backend:statistic:destroy'
    ]);

    Route::resource('/education', 'Backend\EducationController')->names([
        'index' => 'backend:educations',
        'create' => 'backend:education:create',
        'store' =>'backend:education:store',
        'edit' =>'backend:education:edit',
        'update' => 'backend:education:update',
        'destroy' => 'backend:education:destroy'
    ]);

    Route::resource('/research', 'Backend\ResearchController')->names([
        'index' => 'backend:researches',
        'create' => 'backend:research:create',
        'store' =>'backend:research:store',
        'edit' =>'backend:research:edit',
        'update' => 'backend:research:update',
        'destroy' => 'backend:research:destroy'
    ]);

    Route::resource('/project', 'Backend\ProjectController')->names([
        'index' => 'backend:projects',
        'create' => 'backend:project:create',
        'store' =>'backend:project:store',
        'edit' =>'backend:project:edit',
        'update' => 'backend:project:update',
        'destroy' => 'backend:project:destroy'
    ]);

    Route::resource('/publication', 'Backend\PublicationController')->names([
        'index' => 'backend:publications',
        'create' => 'backend:publication:create',
        'store' =>'backend:publication:store',
        'edit' =>'backend:publication:edit',
        'update' => 'backend:publication:update',
        'destroy' => 'backend:publication:destroy'
    ]);

    Route::resource('/award', 'Backend\AwardController')->names([
        'index' => 'backend:awards',
        'create' => 'backend:award:create',
        'store' =>'backend:award:store',
        'edit' =>'backend:award:edit',
        'update' => 'backend:award:update',
        'destroy' => 'backend:award:destroy'
    ]);

    Route::resource('/researcher', 'Backend\ResearcherController')->names([
        'index' => 'backend:researchers',
        'create' => 'backend:researcher:create',
        'store' =>'backend:researcher:store',
        'edit' =>'backend:researcher:edit',
        'update' => 'backend:researcher:update',
        'destroy' => 'backend:researcher:destroy'
    ]);

    Route::resource('/collaborator', 'Backend\CollaboratorController')->names([
        'index' => 'backend:collaborators',
        'create' => 'backend:collaborator:create',
        'store' =>'backend:collaborator:store',
        'edit' =>'backend:collaborator:edit',
        'update' => 'backend:collaborator:update',
        'destroy' => 'backend:collaborator:destroy'
    ]);

    Route::resource('/funding', 'Backend\FundingController')->names([
        'index' => 'backend:fundings',
        'create' => 'backend:funding:create',
        'store' =>'backend:funding:store',
        'edit' =>'backend:funding:edit',
        'update' => 'backend:funding:update',
        'destroy' => 'backend:funding:destroy'
    ]);

    Route::resource('/user', 'Backend\UserController')->names([
        'index' => 'backend:users',
        'store' =>'backend:user:store',
        'edit' =>'backend:user:edit',
        'update' => 'backend:user:update',
        'destroy' => 'backend:user:destroy'
    ]);

    Route::resource('/gallery', 'Backend\GalleryController')->names([
        'index' => 'backend:galleries',
        'create' => 'backend:gallery:create',
        'store' =>'backend:gallery:store',
        'edit' =>'backend:gallery:edit',
        'update' => 'backend:gallery:update',
        'destroy' => 'backend:gallery:destroy'
    ]);

    Route::resource('/blog', 'Backend\BlogController')->names([
        'index' => 'backend:blogs',
        'create' => 'backend:blog:create',
        'store' =>'backend:blog:store',
        'edit' =>'backend:blog:edit',
        'update' => 'backend:blog:update',
        'destroy' => 'backend:blog:destroy'
    ]);

    Route::resource('/keyword', 'Backend\KeywordController')->names([
        'index' => 'backend:keywords',
        'create' => 'backend:keyword:create',
        'store' =>'backend:keyword:store',
        'edit' =>'backend:keyword:edit',
        'update' => 'backend:keyword:update',
        'destroy' => 'backend:keyword:destroy'
    ]);

    Route::resource('/about', 'Backend\AboutController')->names([
        'index' => 'backend:abouts',
        'create' => 'backend:about:create',
        'store' =>'backend:about:store',
        'edit' =>'backend:about:edit',
        'update' => 'backend:about:update',
        'destroy' => 'backend:about:destroy'
    ]);
});


Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
