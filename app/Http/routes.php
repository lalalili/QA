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

Route::get('/', 'StaticController@version');
Route::get('version', 'StaticController@version');
Route::get('patch', 'StaticController@patch');
Route::get('diy', 'DIYReportController@index');
Route::post('diy', 'DIYReportController@query');
Route::get('system', 'StaticController@system');


Route::group(['prefix' => 'api'], function () {
    Route::get('alert', 'DIYReportController@alert');
    Route::get('report', 'DIYReportController@report');
});
