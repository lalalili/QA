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
        $percentMemberName = '';
        $percentGender = '';
        $percentBirthday = '';
        $percentCellphone = '';
        $percentEmail = '';
        $countID = '';
        $percentID = '';
        $countOpenID = '';
        $percentOpenID = '';
        return view('member',
            compact('ShopID', 'MemberID', 'status', 'Member', 'Count', 'countMemberName', 'countGender',
                'countBirthday', 'countCellphone', 'countEmail', 'percentMemberName', 'percentGender',
                'percentBirthday', 'percentCellphone', 'percentEmail', 'countID', 'percentID', 'countOpenID',
                'percentOpenID'));
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
        if (!$ShopID) {
            Flash::overlay('請填入ShopID查詢條件', '提示');
            return Redirect::to('/member');
        } elseif (!$MemberID) {
            $MemberID = '';
            $status = '';
            $Member = '';
            if ($Server == 'CN') {
                $Count = DB::connection('mongocn_store')->table('Member_' . $ShopID)->timeout(-1)->count();
                //dd($Count);
                if ($Count == '0') {
                    Session::put('queryServer', $Server);
                    Session::put('queryShopID', $ShopID);
                    Session::put('queryMemberID', $MemberID);
                    Flash::overlay('查無資料', '提示');
                    return Redirect::to('/member');
                } else {
                    $countMemberName = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('MemberName',
                        '')->timeout(-1)->count();
                    $countGender = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('Gender',
                        '')->timeout(-1)->count();
                    $countBirthday = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('Birthday',
                        '')->timeout(-1)->count();
                    $countCellphone = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('Cellphone',
                        '')->timeout(-1)->count();
                    $countEmail = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('Email',
                        '')->timeout(-1)->count();
                    $countID = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('UID',
                        '')->timeout(-1)->count();
                    $countOpenID = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('Wechat',
                        '')->timeout(-1)->count();
                    $percentMemberName = number_format(($countMemberName / $Count) * 100, 0);
                    $percentGender = number_format(($countGender / $Count) * 100, 0);
                    $percentBirthday = number_format(($countBirthday / $Count) * 100, 0);
                    $percentCellphone = number_format(($countCellphone / $Count) * 100, 0);
                    $percentEmail = number_format(($countEmail / $Count) * 100, 0);
                    $percentID = number_format(($countID / $Count) * 100, 0);
                    $percentOpenID = number_format(($countOpenID / $Count) * 100, 0);


                    //dd($countGender);
                }
            } else {
                $Count = DB::connection('mongotw_store')->table('Member_' . $ShopID)->timeout(-1)->count();
                if ($Count == '0') {
                    Session::put('queryServer', $Server);
                    Session::put('queryShopID', $ShopID);
                    Session::put('queryMemberID', $MemberID);
                    Flash::overlay('查無資料', '提示');
                    return Redirect::to('/member');
                } else {
                    $countMemberName = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('MemberName',
                        '')->timeout(-1)->count();
                    $countGender = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('Gender',
                        '')->timeout(-1)->count();
                    $countBirthday = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('Birthday',
                        '')->timeout(-1)->count();
                    $countCellphone = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('Cellphone',
                        '')->timeout(-1)->count();
                    $countEmail = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('Email',
                        '')->timeout(-1)->count();
                    $countID = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('UID',
                        '')->timeout(-1)->count();
                    $countOpenID = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('Wechat',
                        '')->timeout(-1)->count();
                    $percentMemberName = number_format(($countMemberName / $Count) * 100, 0);
                    $percentGender = number_format(($countGender / $Count) * 100, 0);
                    $percentBirthday = number_format(($countBirthday / $Count) * 100, 0);
                    $percentCellphone = number_format(($countCellphone / $Count) * 100, 0);
                    $percentEmail = number_format(($countEmail / $Count) * 100, 0);
                    $percentID = number_format(($countID / $Count) * 100, 0);
                    $percentOpenID = number_format(($countOpenID / $Count) * 100, 0);
                    //dd($Count);
                }
            }
            //dd(count($Member));
            if ($Server == 'CN') {
                $cn = 'CN';
                return view('member',
                    compact('ShopID', 'MemberID', 'Member', 'status', 'cn', 'Count', 'countMemberName', 'countGender',
                        'countBirthday', 'countCellphone', 'countEmail', 'percentMemberName', 'percentGender',
                        'percentBirthday', 'percentCellphone', 'percentEmail', 'countID', 'percentID', 'countOpenID',
                        'percentOpenID'));
            } else {
                $tw = 'TW';
                return view('member',
                    compact('ShopID', 'MemberID', 'Member', 'status', 'tw', 'Count', 'countMemberName', 'countGender',
                        'countBirthday', 'countCellphone', 'countEmail', 'percentMemberName', 'percentGender',
                        'percentBirthday', 'percentCellphone', 'percentEmail', 'countID', 'percentID', 'countOpenID',
                        'percentOpenID'));
            }
        } else {
            if ($Server == 'CN') {
                $Member = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('MemberID',
                    $MemberID)->timeout(-1)->get();
                if (count($Member) == '0') {
                    Session::put('queryServer', $Server);
                    Session::put('queryShopID', $ShopID);
                    Session::put('queryMemberID', $MemberID);
                    Flash::overlay('Member查無資料', '提示');
                    return Redirect::to('/member');
                } else {
                    $Count = DB::connection('mongocn_store')->table('Member_' . $ShopID)->timeout(-1)->count();
                    $countMemberName = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('MemberName',
                        '')->timeout(-1)->count();
                    $countGender = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('Gender',
                        '')->timeout(-1)->count();
                    $countBirthday = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('Birthday',
                        '')->timeout(-1)->count();
                    $countCellphone = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('Cellphone',
                        '')->timeout(-1)->count();
                    $countEmail = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('Email',
                        '')->timeout(-1)->count();
                    $countID = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('UID',
                        '')->timeout(-1)->count();
                    $countOpenID = DB::connection('mongocn_store')->table('Member_' . $ShopID)->where('Wechat',
                        '')->timeout(-1)->count();
                    $percentMemberName = number_format(($countMemberName / $Count) * 100, 0);
                    $percentGender = number_format(($countGender / $Count) * 100, 0);
                    $percentBirthday = number_format(($countBirthday / $Count) * 100, 0);
                    $percentCellphone = number_format(($countCellphone / $Count) * 100, 0);
                    $percentEmail = number_format(($countEmail / $Count) * 100, 0);
                    $percentID = number_format(($countID / $Count) * 100, 0);
                    $percentOpenID = number_format(($countOpenID / $Count) * 100, 0);

                    //dd($countGender);
                }
            } else {
                $Member = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('MemberID',
                    $MemberID)->timeout(-1)->get();
                if (count($Member) == '0') {
                    Session::put('queryServer', $Server);
                    Session::put('queryShopID', $ShopID);
                    Session::put('queryMemberID', $MemberID);
                    Flash::overlay('Member查無資料', '提示');
                    return Redirect::to('/member');
                } else {
                    $Count = DB::connection('mongotw_store')->table('Member_' . $ShopID)->timeout(-1)->count();
                    $countMemberName = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('MemberName',
                        '')->timeout(-1)->count();
                    $countGender = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('Gender',
                        '')->timeout(-1)->count();
                    $countBirthday = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('Birthday',
                        '')->timeout(-1)->count();
                    $countCellphone = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('Cellphone',
                        '')->timeout(-1)->count();
                    $countEmail = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('Email',
                        '')->timeout(-1)->count();
                    $countID = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('UID',
                        '')->timeout(-1)->count();
                    $countOpenID = DB::connection('mongotw_store')->table('Member_' . $ShopID)->where('Wechat',
                        '')->timeout(-1)->count();
                    $percentMemberName = number_format(($countMemberName / $Count) * 100, 0);
                    $percentGender = number_format(($countGender / $Count) * 100, 0);
                    $percentBirthday = number_format(($countBirthday / $Count) * 100, 0);
                    $percentCellphone = number_format(($countCellphone / $Count) * 100, 0);
                    $percentEmail = number_format(($countEmail / $Count) * 100, 0);
                    $percentID = number_format(($countID / $Count) * 100, 0);
                    $percentOpenID = number_format(($countOpenID / $Count) * 100, 0);
                    //dd($Count);
                }
            }
            //dd(count($Member));
            if ($Server == 'CN') {
                $cn = 'CN';
                return view('member',
                    compact('ShopID', 'MemberID', 'Member', 'status', 'cn', 'Count', 'countMemberName', 'countGender',
                        'countBirthday', 'countCellphone', 'countEmail', 'percentMemberName', 'percentGender',
                        'percentBirthday', 'percentCellphone', 'percentEmail', 'countID', 'percentID', 'countOpenID',
                        'percentOpenID'));
            } else {
                $tw = 'TW';
                return view('member',
                    compact('ShopID', 'MemberID', 'Member', 'status', 'tw', 'Count', 'countMemberName', 'countGender',
                        'countBirthday', 'countCellphone', 'countEmail', 'percentMemberName', 'percentGender',
                        'percentBirthday', 'percentCellphone', 'percentEmail', 'countID', 'percentID', 'countOpenID',
                        'percentOpenID'));
            }
        }
    }
}
