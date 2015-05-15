<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DB;
use Session;
use Flash;
use Redirect;
use DateTime;
use Request;
use App\Store;

use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{

    public function index()
    {
        $ShopID = '';
        $StoreName = '';
        $status = '預設值';
        $Store = new Store;
        $Server = 'CN';
        $Stores = DB::connection('mongocn_store')->table($Store->collection)->where('ShopID', 'grandpacific')->where('StoreName', '黄金')->get();
        //dd($Stores);
        foreach ($Stores as $Store) {
            //dd($Store['ShopID']);
        }

        return view('store', compact('Store', 'ShopID', 'StoreName', 'status', 'Server'));
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
            $Stores = DB::connection('mongocn_store')->table($Store->collection)->where('ShopID', $ShopID)->where('StoreName', $StoreName)->get();
            $cn = 'CN';
            //dd($Stores);
        } else {
            $Stores = DB::connection('mongotw_store')->table($Store->collection)->where('ShopID', $ShopID)->where('StoreName', $StoreName)->get();
            $tw = 'TW';
            //dd($Stores);
        }
        //dd(count($Stores));
        if (count($Stores) == '0') {
            Flash::overlay('Store查無資料', '提示');
            return Redirect::to('/store');
        }
        foreach ($Stores as $Store) {
            //dd($Stores['ShopID');
        }
        $saveStoreID = $Store['ShopID'].'^'.$Store['Category1'].'^'.$Store['Category2'].'^'.$Store['Category3'].'^'.$Store['StoreID'];
        //dd($StroeID);
        Session::put('saveStoreID', $saveStoreID);


        if ($Server == 'CN') {
            return view('store', compact('Store', 'ShopID', 'StoreName', 'status', 'cn'));
        } else {
            return view('store', compact('Store', 'ShopID', 'StoreName', 'status', 'tw'));
        }
    }
    
}
