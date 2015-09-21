<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Session;
use Flash;
use Redirect;
use DateTime;
use Request;
use App\Qa\Entities\Store;

use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{

    public function index()
    {
//        $queryServer = Session::pull('queryServer');
//        $queryShopID = Session::pull('queryShopID');
//        $queryStoreName = Session::pull('queryStoreName');
//        //dd(count('$queryShopID'));
//        if (count('$queryShopID') <> '0') {
//            $Server = $queryServer;
//            //dd($Server);
//            $ShopID = $queryShopID;
//            $StoreName = $queryStoreName;
//            $status = '查無資料';
//        } else {
//            $Server = 'CN';
//            $ShopID = '';
//            $StoreName = '';
//            $status = '預設值';
//        }

//        $Store = new Store;
//        $Stores = DB::connection('mongocn_store')->table($Store->collection)->where('ShopID', 'grandpacific')->where('StoreName', '黄金')->get();
//        //dd($Stores);
//        foreach ($Stores as $Store) {
//            //dd($Store['ShopID']);
//        }
//        if ($Store['Category3'] == '-999') {
//            $StoreID = $Store['ShopID'] . '^' . $Store['Category1'] . '^' . $Store['Category2'] . '^' . $Store['StoreID'];
//        } elseif ($Store['Category2'] == '-999') {
//            $StoreID = $Store['ShopID'] . '^' . $Store['Category1'] . '^' . $Store['Category3'] . '^' . $Store['StoreID'];
//        } elseif ($Store['Category1'] == '-999') {
//            $StoreID = $Store['ShopID'] . '^' . $Store['Category2'] . '^' . $Store['Category3'] . '^' . $Store['StoreID'];
//        } else {
//            $StoreID = $Store['ShopID'] . '^' . $Store['Category1'] . '^' . $Store['Category2'] . '^' . $Store['Category3'] . '^' . $Store['StoreID'];
//        }
//        if($Server =='CN'){
//            $cn = 'CN';
//            return view('store', compact('StoreID', 'ShopID', 'StoreName', 'status', 'cn'));
//        }else{
//            $tw = 'TW';
//            return view('store', compact('StoreID', 'ShopID', 'StoreName', 'status', 'tw'));
//        }
        $StoreID = '';
        $ShopID = '';
        $StoreName = '';
        $status = '';
        return view('store', compact('StoreID', 'ShopID', 'StoreName', 'status'));

    }

    public function query()
    {
        $Server = Request::input('Server');
        $ShopID = Request::input('ShopID');
        $StoreName = Request::input('StoreName');
        $status = '查詢完成';
        $Store = new Store;
        //dd($Server);
        //dd($ShopID);
        //dd($StoreName);
        if (!$ShopID | !$StoreName) {
            Flash::overlay('請填入完整查詢條件', '提示');
            return Redirect::to('/store');
        }
        if ($Server == 'CN') {
            $Stores = DB::connection('mongocn_store')->table($Store->collection)->where('ShopID', $ShopID)->where('StoreName', $StoreName)->timeout(-1)->get();
            //dd($Stores);
        } else {
            $Stores = DB::connection('mongotw_store')->table($Store->collection)->where('ShopID', $ShopID)->where('StoreName', $StoreName)->timeout(-1)->get();
            //dd($Stores);
        }
        //dd(count($Stores));
        if (count($Stores) == '0') {
            Session::put('queryServer', $Server);
            Session::put('queryShopID', $ShopID);
            Session::put('queryStoreName', $StoreName);
            Flash::overlay('Store查無資料', '提示');
            return Redirect::to('/store');
        }
        foreach ($Stores as $Store) {
            //dd($Store);
        }
        //dd($Store);
        if ($Store['Category1'] == '-999'& $Store['Category2'] == '-999' & $Store['Category3'] == '-999') {
            $StoreID = $Store['ShopID']  . '^' . $Store['StoreID'];
        } elseif ($Store['Category1'] == '-999'& $Store['Category2'] == '-999') {
            $StoreID = $Store['ShopID'] . '^' . $Store['Category3']   . '^' . $Store['StoreID'];
        } elseif ($Store['Category1'] == '-999'& $Store['Category3'] == '-999') {
            $StoreID = $Store['ShopID'] . '^' . $Store['Category2']   . '^' . $Store['StoreID'];
        } elseif ($Store['Category2'] == '-999'& $Store['Category3'] == '-999') {
            $StoreID = $Store['ShopID'] . '^' . $Store['Category1']   . '^' . $Store['StoreID'];
        } elseif ($Store['Category1'] == '-999') {
            $StoreID = $Store['ShopID'] . '^' . $Store['Category2'] . '^' . $Store['Category3'] . '^' . $Store['StoreID'];
        } elseif ($Store['Category2'] == '-999') {
            $StoreID = $Store['ShopID'] . '^' . $Store['Category1'] . '^' . $Store['Category3'] . '^' . $Store['StoreID'];
        } elseif ($Store['Category3'] == '-999') {
            $StoreID = $Store['ShopID'] . '^' . $Store['Category1'] . '^' . $Store['Category2'] . '^' . $Store['StoreID'];
        } else {
            $StoreID = $Store['ShopID'] . '^' . $Store['Category1'] . '^' . $Store['Category2'] . '^' . $Store['Category3'] . '^' . $Store['StoreID'];
        }
        //dd($StroeID);
        Session::put('saveStoreID', $StoreID);


        if ($Server == 'CN') {
            $cn = 'CN';
            return view('store', compact('StoreID', 'ShopID', 'StoreName', 'status', 'cn'));
        } else {
            $tw = 'TW';
            return view('store', compact('StoreID', 'ShopID', 'StoreName', 'status', 'tw'));
        }
    }

}
