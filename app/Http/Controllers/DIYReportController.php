<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Session;
use Flash;
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
        $StoreID = '';
        $PeriodType = '';
        $CalDate = '';
        $status = '預設值';
        $display = 'panel-info';
        $DIYReports = DIYReport::where('StoreID', 'ablejeans^特殊渠道^特殊渠道^百货商场')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        foreach ($DIYReports as $DIYReport) {
            $report = $DIYReport['PeriodRecords'];
        }

        $KPIAlerts = KPIAlert::where('StoreID', 'ablejeans^特殊渠道^特殊渠道^百货商场')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        foreach ($KPIAlerts as $KPIAlert) {
            $alert = $KPIAlert['KPIAlert'];
            //dd($alert);
        }
        return view('diy', compact('report', 'alert', 'StoreID', 'PeriodType', 'CalDate', 'status', 'display'))->with('diy', new DIYReportController);
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
        $status = '查詢完成';
        //dd($StoreID);
        //dd($PeriodType);
        //dd($CalDate);
        if (!$StoreID | !$PeriodType | !$CalDate) {
            Flash::overlay('請填入完整查詢條件', '提示');
            return Redirect::to('/diy');
        }
        $DIYReports = DIYReport::where('StoreID', $StoreID)->where('PeriodType', $PeriodType)->where('CalDate', new DateTime($CalDate))->get();
        ///dd(count($DIYReports));
        if (count($DIYReports) == '0') {
            Flash::overlay('查無資料', '提示');
            return Redirect::to('/diy');
        }
        foreach ($DIYReports as $DIYReport) {
            $report = $DIYReport['PeriodRecords'];
            //dd($DIYReports);
        }
        $KPIAlerts = KPIAlert::where('StoreID', $StoreID)->where('PeriodType', $PeriodType)->where('CalDate', new DateTime($CalDate))->get();
        //dd($KPIAlerts);
        if (count($KPIAlerts) == '0') {
            Flash::overlay('查無資料', '提示');
            return Redirect::to('/diy');
        }
        foreach ($KPIAlerts as $KPIAlert) {
            $alert = $KPIAlert['KPIAlert'];
            //dd($alert);
        }
        return view('diy', compact('report', 'alert', 'StoreID', 'PeriodType', 'CalDate', 'status'))->with('diy', new DIYReportController);
    }

    public function percent_formatter($original)
    {
        //dd($original);
        if ($original == '-999') {
            //dd($original);
            return ($original);
        }
        return number_format(($original * 100), 2);
    }

    public function arpu_formatter($original)
    {
        //dd($original);
        if ($original == '-999') {
            //dd($original);
            return ($original);
        }
        return number_format(($original), 1);
    }

    public function alert_formatter($original)
    {
        //dd($original);
        if ($original == 'True') {
            //dd($original);
            $display = 'panel-alert';
            return ($display);
        }
        $display = 'panel-info';
        return ($display);
    }
}
