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
        $server = $request->input('server');
        $company = $request->input('company');
        $result = $request->input('result');
        $note1 = $request->input('note1');
        $test = new Report;
        $test->company = $company;
        $test->result = $result;
        $test->server = $server;
        $test->note1 = $note1;
        $test->save();
    }

    public function resetReport(Request $request)
    {
        if ($request->input('server') == 'TW') {
            DB::connection('mysql')->table('reports')->where('server', 'TW')->delete();
        } else if ($request->input('server') == 'CN') {
            DB::connection('mysql')->table('reports')->where('server', 'CN')->delete();
        } else {
            return 'wrong server';
        }
        
    }

    public function showReport()
    {
        $tw_reports = Report::where('server', 'TW')->get();
        $cn_reports = Report::where('server', 'CN')->get();
        return view('test.report',compact('tw_reports', 'cn_reports'));
    }
}
