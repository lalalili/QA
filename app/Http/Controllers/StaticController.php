<?php namespace App\Http\Controllers;

class StaticController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */


    public function index()
    {
        return view('version');
    }

    public function patch()
    {
        return view('patch');
    }

    public function system()
    {
        return view('system');
    }

    public function version()
    {
        return view('version');
    }
}
