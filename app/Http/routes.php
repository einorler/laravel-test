<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('kontroleris', ['as' => 'kontroleris', 'uses' => 'MainController@firstAction']);
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/transport', ['as' => 'admin_transport', 'uses' =>'AdminController@transportAction']);
    Route::get('/admin/users', ['as' => 'admin_users', 'uses' => 'AdminController@usersAction']);
    Route::get('/admin/reports', ['as' => 'admin_reports', 'uses' =>'AdminController@reportsAction']);
    Route::post('/admin/reports', ['as' => 'report-create', 'uses' =>'AdminController@reportsAction']);
    Route::post('/admin/transport', ['as' => 'transport-create', 'uses' =>'AdminController@transportAction']);
    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');
    Route::get('/trip', 'HomeController@tripAction');
    Route::post('/trip', 'HomeController@tripAction');
});
