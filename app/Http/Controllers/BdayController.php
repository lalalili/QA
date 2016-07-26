<?php namespace App\Http\Controllers;

use App\Qa\Entities\Bday;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DataGrid;
use DataEdit;
use DataFilter;
use DB;
use Illuminate\Http\Request;
use Input;

class BdayController extends Controller {


	public function anyList()
	{
        $filter = DataFilter::source(new Bday);
        $filter->add('to','Name', 'text');
        $filter->add('birthday','Birthday','daterange')->format('Y/m/d', 'en');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);
        $grid->link('/bday/edit',"Add", "TR");
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('to','Name', true);
        $grid->add('birthday','Birthday', true);//field name, label, sortable
        $grid->edit('/bday/edit', 'Edit','modify|delete'); //shortcut to link DataEdit
        $grid->orderBy('to','asc'); //default orderby
        $grid->paginate(10); //pagination
        //dd($dataset);
        $total = Bday::all()->count();
        return view('bday.bday',compact('filter','grid', 'total'));
	}

	public function anyEdit()
	{
//        if (Input::get('do_delete')==1) return  "not the first";

        $edit = DataEdit::source(new Bday);
        $edit->link("/bday/list","Back", "BL")->back();
        $edit->label('Edit');
        $edit->add('to','Name', 'text')->rule('required|min:3');
        $edit->add('birthday','Birthday','date')->format('Y/m/d', 'en')->rule('required|date');
        return $edit->view('bday.edit', compact('edit'));
	}

}
