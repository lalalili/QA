<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Session;
use Redirect;
use DateTime;
use Request;
use App\DIYReport;
use App\KPIAlert;
use Illuminate\Support\Facades\Input;

class DIYReportController extends Controller
{

    public function index()
    {
        $StoreID ='';
        $PeriodType ='';
        $CalDate ='';
        $DIYReports = DIYReport::where('StoreID', 'ablejeans^特殊渠道^特殊渠道^百货商场')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        foreach ($DIYReports as $DIYReport) {
            $report = $DIYReport['PeriodRecords'];
        }

        $KPIAlerts = KPIAlert::where('StoreID', 'ablejeans^特殊渠道^特殊渠道^百货商场')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        foreach ($KPIAlerts as $KPIAlert) {
            $alert = $KPIAlert['KPIAlert'];
            //dd($alert);
        }
        return view('diy', compact('report', 'alert', 'StoreID', 'PeriodType', 'CalDate'))->with('diy', new DIYReportController);
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
        $CalDate = Request::input('CalDate');
        //dd($StoreID);
        //dd($PeriodType);
        //dd($CalDate);
        if(!$StoreID | !$PeriodType | !$CalDate)
        {
            Session::flash('error', 'Resource was not found');
            return Redirect::to('/diy');
        }
        $DIYReports = DIYReport::where('StoreID', $StoreID)->where('PeriodType', $PeriodType)->where('CalDate', new DateTime($CalDate))->get();
        //dd($DIYReports);
        if(!$DIYReports)
        {
            Session::flash('error', 'Resource was not found');
            return Redirect::to('/diy');
        }
        foreach ($DIYReports as $DIYReport) {
            $report = $DIYReport['PeriodRecords'];
            //dd($DIYReports);
        }
        $KPIAlerts = KPIAlert::where('StoreID', $StoreID)->where('PeriodType', $PeriodType)->where('CalDate', new DateTime($CalDate))->get();
        if(!$KPIAlerts)
        {
            Session::flash('error', 'Resource was not found');
            return Redirect::to('/diy');
        }
        foreach ($KPIAlerts as $KPIAlert) {
            $alert = $KPIAlert['KPIAlert'];
            //dd($alert);
        }

        return view('diy', compact('report', 'alert', 'StoreID', 'PeriodType', 'CalDate'))->with('diy', new DIYReportController);


    }

    public function formatter($original)
    {
        //dd($original);
        if($original == '-999')
        {
            //dd($original);
            return ($original);
        }
        return number_format(($original*100),2);

    }
}
