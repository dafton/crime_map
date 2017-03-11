<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Auth routes
Route::get('/', 'HomeController@index');

Route::post('register-user', 'Auth\AuthController@registerUser');
Route::auth();

//Record Management routes
Route::post('add-record', 'HomeController@add_record');
Route::get('add','Homecontroller@add');
Route::get('update_records', 'HomeController@update_records');
Route::get('delete_records_page', 'HomeController@record_management');
Route::get('edit/{id}', 'HomeController@edit');
Route::post('edit/{id}', 'HomeController@update');
Route::get('/home', 'HomeController@index');
Route::get('/delete/{id}','TodoController@destroy');

//map route
Route::get('maps', 'HomeController@maps');
Route::get('markers', 'HomeController@markers');

//Admin Routes
Route::get('delete_view', 'AdminController@view_users_delete');
Route::get('/delete_user/{id}','AdminController@destroy');
Route::get('update_view', 'AdminController@view_users_update');
Route::get('/update_user/{id}', 'AdminController@edit');
Route::post('/update_user/{id}','AdminController@update');
Route::get('/search_users_view', 'AdminController@search_view');
Route::get('patrol', 'AdminController@patrol_view');
Route::post('patrol_create', 'AdminController@patrol_create');
Route::get('get_patrol', 'AdminController@get_patrol');
Route::get('patrol_map/{id}', 'AdminController@patrol_map');
Route::get('patrol_markers/{id}', 'AdminController@patrol_map_markers');

//Search routes(records)
Route::get('search_crime_records_welcome', 'SearchController@search_records_welcome');
Route::get('search_crime_records_update', 'SearchController@search_records_update');
Route::get('search_crime_records_delete', 'SearchController@search_records_delete');
//Search routes(users)
Route::get('search_users', 'SearchController@search_users');
Route::get('search_users_update', 'SearchController@search_users_update');
Route::get('search_users_delete', 'SearchController@search_users_delete');

//routes for reports
Route::get('get_report', 'ReportsController@reports_page');
Route::get('get_recommendation_data', 'ReportsController@recommendation_markers');