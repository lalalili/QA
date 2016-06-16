<?php

namespace App\Http\Controllers;

use App\Report;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function getReport()
    {
        $report = Report::all();
        return $report;
    }

    public function setReport(Request $request)
    {
        $company = $request->input('company');
        $result = $request->input('result');
        $test = new Report;
        $test->company = $company;
        $test->result = $result;
        $test->save();
    }

    public function resetReport()
    {
        DB::connection('mysql')->table('reports')->truncate();
    }
}
