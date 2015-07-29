<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Qa\Entities\Company;
use Excel;
use Flash;
use Input;
use Redirect;
use Request;
use Session;
use Validator;
use DB;


class CompanyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $datas = Company::orderBy('site', 'asc')->get();
        return view('company', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $file = array('upload' => Request::file('upload'));
        $rules = array('upload' => 'required',);
        //dd(Request::file('upload'));
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            Flash::overlay('請選擇上傳Excel檔案', '警告');
            return Redirect::to('company');
        } else {
            // checking file is valid.
            $upload_name = Request::file('upload')->getClientOriginalName();
            //dd($upload_name);
            if ($upload_name == 'acc_company.xlsx') {
                $destinationPath = 'uploads'; // upload path
                //$extension = Request::file('image')->getClientOriginalExtension(); // getting image extension
                //$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $fileName = 'upload.xlsx';
                Request::file('upload')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                //Flash::overlay('success', 'Upload successfully');
                $file = public_path() . '/' . $destinationPath . '/' . $fileName;
                //dd($file);
                $uploads = Excel::load($file, function ($reader) {
                })->get()->toArray();
                //dd($data);
                Company::truncate();
                foreach ($uploads as $upload) {
                    Company::create($upload);
                }
                unlink($file);
                //Company::insert($upload);
                //Flash::overlay('上傳成功','Info');
                $datas = Company::orderBy('site', 'asc')->get();
                return view('company',compact('datas'));
            } else {
                // sending back with error message.
                Flash::overlay('請上傳正確檔案', '警告');
                return Redirect::to('company');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public
    function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        //
    }

}
