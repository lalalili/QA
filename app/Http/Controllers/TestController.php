<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Test;

class TestController extends Controller
{
    public function getCount()
    {
        $count = DB::connection('mysql')->table('tests')->value('count');
        return $count;
    }

    public function setCount(Request $request)
    {
        $count = $request->input('count');
        DB::connection('mysql')->table('tests')->truncate();
        $test = new Test;
        $test->count = $count;
        $test->save();
    }
}
