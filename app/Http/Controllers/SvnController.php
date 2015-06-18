<?php namespace App\Http\Controllers;

use App\Qa\Entities\Status;
use DB;

class SvnController extends Controller {

    public function index(){

        $statuses = DB::connection('mysql')->table('Statuses')
            ->leftjoin('sites',  'statuses.site_id', '=', 'sites.id')
            ->leftjoin('versions',  'statuses.version_id', '=', 'versions.id')
            ->leftjoin('sub_versions',  'statuses.subversion_id', '=', 'sub_versions.id')
            ->select('sites.id as id ', 'sites.name as name', 'versions.name as version', 'sub_versions.name as patch', 'statuses.updated_at')
            ->get();
        //dd($statuses);

        return view('version', compact('statuses'));
        //return view(version, compact('site_names,version_names,subversion_names'));
    }
}