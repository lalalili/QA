<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Session;
use Flash;
use Redirect;
use DateTime;
use Request;
use Validator;
use App\Qa\Entities\DIYReport;
use App\Qa\Entities\KPIAlert;
use Illuminate\Support\Facades\Input;

class DIYReportController extends Controller
{

    public function index()
    {

        $saveStoreID = Session::pull('saveStoreID');
        $queryServer = Session::pull('queryServer');
        $queryStoreID = Session::pull('queryStoreID');
        $queryPeriodType = Session::pull('queryPeriodType');
        $queryCalDat = Session::pull('queryCalDate');
        //dd($saveStoreID);
        //dd(isset($StoreID));
        if (count($saveStoreID) <> '0') {
            $Server = 'CN';
            $StoreID = $saveStoreID;
            $PeriodType = '';
            $CalDate = '';
            $status = '門店層級已讀取';
        } else if (count($queryStoreID) <> '0') {
            $Server = $queryServer;
            $StoreID = $queryStoreID;
            $PeriodType = $queryPeriodType;
            $CalDate = $queryCalDat;
            $status = '查無資料';
        } else {
            $Server = 'CN';
            $StoreID = '';
            $PeriodType = '';
            $CalDate = '';
            $status = '預設值';
        }


        $display = 'panel-info';
        $DIYReports = DIYReport::where('StoreID', 'ablejeans^特殊渠道^特殊渠道')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        //dd(new DateTime('2015-01-31'));
        //dd($DIYReports);
        if(count($DIYReports) == 0)
        {
            $DIYReports = DIYReport::where('StoreID', 'jtwr')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        }
        foreach ($DIYReports as $DIYReport) {
            $report = $DIYReport['PeriodRecords'];
        }

        $KPIAlerts = KPIAlert::where('StoreID', 'ablejeans^特殊渠道^特殊渠道')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        if(count($KPIAlerts) == 0)
        {
            $KPIAlerts = KPIAlert::where('StoreID', 'jtwr')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        }
        foreach ($KPIAlerts as $KPIAlert) {
            $alert = $KPIAlert['KPIAlert'];
            //dd($alert);
        }
        if ($Server == 'CN') {
            $cn = 'CN';
            return view('diy', compact('report', 'alert', 'StoreID', 'PeriodType', 'CalDate', 'status', 'display', 'cn', 'DIYReports', 'KPIAlerts'))->with('diy', new DIYReportController);
        } else {
            $tw = 'TW';
            return view('diy', compact('report', 'alert', 'StoreID', 'PeriodType', 'CalDate', 'status', 'display', 'tw', 'DIYReports', 'KPIAlerts'))->with('diy', new DIYReportController);
        }

    }

    public function report()
    {
        $DIYReports = DIYReport::where('StoreID', 'ablejeans^特殊渠道^特殊渠道')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        return $DIYReports;
    }

    public function alert()
    {
        $KPIAlerts = KPIAlert::where('StoreID', 'ablejeans^特殊渠道^特殊渠道')->where('PeriodType', 'L31D')->where('CalDate', new DateTime('2015-01-31'))->get();
        return $KPIAlerts;
    }

    public function query(\Illuminate\Http\Request $request)
    {
        $v = Validator::make($request->all(), [
            'StoreID' => 'required',
            'PeriodType' => 'required',
            'CalDate' => 'required|date',

        ]);
        if ($v->fails()) {
            Flash::overlay('請輸入完整查詢條件', '提示');
            return Redirect::to('/diy');
        }
        $Server = Request::input('Server');
        $StoreID = Request::input('StoreID');
        $PeriodType = Request::input('PeriodType');
        $CalDate = Request::input('CalDate');
        $status = '查詢完成';
        $DIYReport = new DIYReport;
        $KPIAlert = new KPIAlert;
        //dd($Server);
        //dd($StoreID);
        //dd($PeriodType);
        //dd($CalDate);


        if ($Server == 'CN') {
            $DIYReports = DB::connection('mongocn')->table($DIYReport->collection)->where('StoreID', $StoreID)->where('PeriodType', $PeriodType)->where('CalDate', new DateTime($CalDate))->timeout(-1)->get();
            //dd($DIYReports);
        } else {
            $DIYReports = DB::connection('mongotw')->table($DIYReport->collection)->where('StoreID', $StoreID)->where('PeriodType', $PeriodType)->where('CalDate', new DateTime($CalDate))->timeout(-1)->get();
            //dd($DIYReports);
        }
        ///dd(count($DIYReports));
        if (count($DIYReports) == '0') {
            Session::put('queryServer', $Server);
            Session::put('queryStoreID', $StoreID);
            Session::put('queryPeriodType', $PeriodType);
            Session::put('queryCalDate', $CalDate);
            Flash::overlay('DIYReport查無資料', '提示');
            return Redirect::to('/diy');
        }
        foreach ($DIYReports as $DIYReport) {
            $report = $DIYReport['PeriodRecords'];
            //dd($DIYReports);
        }
        if ($Server == 'CN') {
            $KPIAlerts = DB::connection('mongocn')->table($KPIAlert->collection)->where('StoreID', $StoreID)->where('PeriodType', $PeriodType)->where('CalDate', new DateTime($CalDate))->timeout(-1)->get();
        } else {
            $KPIAlerts = DB::connection('mongotw')->table($KPIAlert->collection)->where('StoreID', $StoreID)->where('PeriodType', $PeriodType)->where('CalDate', new DateTime($CalDate))->timeout(-1)->get();
        }
        //dd($KPIAlerts);
        if (count($KPIAlerts) == '0') {
            Session::put('queryServer', $Server);
            Session::put('queryStoreID', $StoreID);
            Session::put('queryPeriodType', $PeriodType);
            Session::put('queryCalDate', $CalDate);
            Flash::overlay('KPIAlert查無資料', '提示');
            return Redirect::to('/diy');
        }
        foreach ($KPIAlerts as $KPIAlert) {
            $alert = $KPIAlert['KPIAlert'];
            //dd($alert);
        }
        if ($Server == 'CN') {
            $cn = 'CN';
            return view('diy', compact('report', 'alert', 'StoreID', 'PeriodType', 'CalDate', 'status', 'cn', 'DIYReports', 'KPIAlerts'))->with('diy', new DIYReportController);
        } else {
            $tw = 'TW';
            return view('diy', compact('report', 'alert', 'StoreID', 'PeriodType', 'CalDate', 'status', 'tw',  'DIYReports', 'KPIAlerts'))->with('diy', new DIYReportController);
        }
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
