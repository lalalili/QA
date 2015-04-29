<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DateTime;
use Request;
use App\DIYReport;
use App\KPIAlert;
use Illuminate\Support\Facades\Input;

class DIYReportController extends Controller
{

    public function index()
    {
        $DIYReports = DIYReport::where('StoreID', 'ablejeans^特殊渠道^特殊渠道^百货商场')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        foreach ($DIYReports as $DIYReport) {
            $report = $DIYReport['PeriodRecords'];
        }

        $KPIAlerts = KPIAlert::where('StoreID', 'ablejeans^特殊渠道^特殊渠道^百货商场')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        foreach ($KPIAlerts as $KPIAlert) {
            $alert = $KPIAlert['KPIAlert'];
            //dd($alert);
        }
        return view('diy', compact('report', 'alert'))->with('diy', new DIYReportController);
    }

    public function report()
    {
        $DIYReports = DIYReport::where('StoreID', 'ablejeans^特殊渠道^特殊渠道^百货商场')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        return $DIYReports;
    }

    public function alert()
    {
        $KPIAlerts = KPIAlert::where('StoreID', 'ablejeans^特殊渠道^特殊渠道^百货商场')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        return $KPIAlerts;
    }

    public function query()
    {
        $StoreID = Request::input('StoreID');
        $PeriodType = Request::input('PeriodType');
        $Calldate = Request::input('CalDate');
        //dd($StoreID);
        //dd($PeriodType);
        //dd($Calldate);
        $DIYReports = DIYReport::where('StoreID', $StoreID)->where('PeriodType', $PeriodType)->where('CalDate', new DateTime($Calldate))->get();
        foreach ($DIYReports as $DIYReport) {
            $report = $DIYReport['PeriodRecords'];
            //dd($DIYReports);
        }
        $KPIAlerts = KPIAlert::where('StoreID', $StoreID)->where('PeriodType', $PeriodType)->where('CalDate', new DateTime($Calldate))->get();
        foreach ($KPIAlerts as $KPIAlert) {
            $alert = $KPIAlert['KPIAlert'];
        }
        return view('diy', compact('report','alert'));

    }

    public function formatter($original)
    {
        //dd($original);
        return number_format(($original*100),2);
    }
}
