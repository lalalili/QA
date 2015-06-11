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


Route::get('/', [
    'as' => 'version', 'uses' => 'VersionController@anyList'
]);
Route::get('patch', 'StaticController@patch');
Route::get('diy', 'DIYReportController@index');
Route::post('diy', 'DIYReportController@query');
Route::get('store', 'StoreController@index');
Route::post('store', 'StoreController@query');
Route::get('system', 'StaticController@system');

Route::group(['prefix' => 'api'], function () {
    Route::get('alert', 'DIYReportController@alert');
    Route::get('report', 'DIYReportController@report');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'],function () {
    Route::controller('bday', 'BdayController');
    Route::post('company', 'CompanyController@store');
});

Route::controller('version', 'VersionController');

Route::get('company', 'CompanyController@index');

