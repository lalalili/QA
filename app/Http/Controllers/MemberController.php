<?php

namespace App\Http\Controllers;

use App\Qa\Entities\Member;
use DB;
use Flash;
//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Session;
use Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $ShopID = '';
        $MemberID = '';
        $status = '';
        $Member = '';
        $Count = '';
        $countMemberName = '';
        $countGender = '';
        $countBirthday = '';
        $countCellphone = '';
        $countEmail = '';
        return view('member',compact('ShopID', 'MemberID', 'status', 'Member', 'Count', 'countMemberName', 'countGender', 'countBirthday', 'countCellphone', 'countEmail'));
    }

    public function query()
    {
        $Server = Request::input('Server');
        $ShopID = Request::input('ShopID');
        $MemberID = Request::input('MemberID');
        $status = '查詢完成';
        $Member = new Member;
        //dd($Server);
        //dd($ShopID);
        //dd($StoreName);
        if (!$ShopID | !$MemberID) {
            Flash::overlay('請填入完整查詢條件', '提示');
            return Redirect::to('/member');
        }
        if ($Server == 'CN') {
            $Member = DB::connection('mongocn_store')->table('Member_'.$ShopID)->where('MemberID', $MemberID)->timeout(-1)->get();
            $Count = DB::connection('mongocn_store')->table('Member_'.$ShopID)->timeout(-1)->count();
            $countMemberName = DB::connection('mongocn_store')->table('Member_'.$ShopID)->where('MemberName', '')->timeout(-1)->count();
            $countGender = DB::connection('mongocn_store')->table('Member_'.$ShopID)->where('Gender', '')->timeout(-1)->count();
            $countBirthday = DB::connection('mongocn_store')->table('Member_'.$ShopID)->where('Birthday', '')->timeout(-1)->count();
            $countCellphone = DB::connection('mongocn_store')->table('Member_'.$ShopID)->where('Cellphone', '')->timeout(-1)->count();
            $countEmail = DB::connection('mongocn_store')->table('Member_'.$ShopID)->where('Email', '')->timeout(-1)->count();

            //dd($countGender);
        } else {
            $Member = DB::connection('mongotw_store')->table('Member_'.$ShopID)->where('MemberID', $MemberID)->timeout(-1)->get();
            $Count = DB::connection('mongotw_store')->table('Member_'.$ShopID)->timeout(-1)->count();
            $countMemberName = DB::connection('mongotw_store')->table('Member_'.$ShopID)->where('MemberName', '')->timeout(-1)->count();
            $countGender = DB::connection('mongotw_store')->table('Member_'.$ShopID)->where('Gender', '')->timeout(-1)->count();
            $countBirthday = DB::connection('mongotw_store')->table('Member_'.$ShopID)->where('Birthday', '')->timeout(-1)->count();
            $countCellphone = DB::connection('mongotw_store')->table('Member_'.$ShopID)->where('Cellphone', '')->timeout(-1)->count();
            $countEmail = DB::connection('mongotw_store')->table('Member_'.$ShopID)->where('Email', '')->timeout(-1)->count();
            //dd($Count);
        }
        //dd(count($Member));
        if (count($Member) == '0') {
            Session::put('queryServer', $Server);
            Session::put('queryShopID', $ShopID);
            Session::put('queryMemberID', $MemberID);
            Flash::overlay('Member查無資料', '提示');
            return Redirect::to('/member');
        }

        if ($Server == 'CN') {
            $cn = 'CN';
            return view('member', compact('ShopID', 'MemberID', 'Member', 'status', 'cn', 'Count', 'countMemberName', 'countGender', 'countBirthday', 'countCellphone', 'countEmail'));
        } else {
            $tw = 'TW';
            return view('member', compact('ShopID', 'MemberID', 'Member', 'status', 'tw', 'Count', 'countMemberName', 'countGender', 'countBirthday', 'countCellphone', 'countEmail'));
        }
    }
}
