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
Route::get('company', 'CompanyController@index');
Route::get('member', 'MemberController@index');
Route::post('member', 'MemberController@query');
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


Route::get('mail_test', function()
{
    // 傳送給郵件view的變數資料
    $template_data = array(
        'name'=> 'James'
    );
    // 收件者資料
    $userinfo = array(
        'email'=>'james_liang@migocorp.com',
        'subject'=>'歡迎使用 Laravel Mail!'
    );
    // 寄送郵件，使用use方法將資料從外部傳送給匿名函式使用
    Mail::send('emails.test', $template_data, function($message) use ($userinfo)
    {
        $message->to($userinfo['email'])->subject($userinfo['subject']);
    });
    echo '完成寄送!!';
});

Route::group(['prefix' => 'test'], function () {
    Route::get('getcount', 'TestController@getCount');
    Route::get('setcount', 'TestController@setCount');
    Route::get('getreport', 'ReportController@getReport');
    Route::get('setreport', 'ReportController@setReport');
    Route::get('resetreport', 'ReportController@resetReport');
});