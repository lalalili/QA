<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Qa\Entities\Site;
use App\Qa\Entities\Status;
use App\Qa\Entities\Svn;
use App\Qa\Entities\Regular;
use DataEdit;
use DataFilter;
use DataGrid;
use Input;
use View;


class VersionController extends Controller
{

    public function anyList()
    {

        $filter = DataFilter::source(Status::with('site', 'regular', 'svn'));
        //dd($filter);
        $filter->add('site.name', 'Site', 'text');
        $filter->add('updated_at', 'Last Updated', 'daterange')->format('Y/m/d', 'en');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = DataGrid::source($filter);

        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('{{ $site->name }}', 'Site', 'site_id');
        $grid->add('{{ $regular->name }}', 'Regular', 'regular_id');
        $grid->add('{{ implode(", ", $svn->lists("name")->all()) }}', 'SVN');
        $grid->add('updated_at', 'Last Updated');

        $grid->edit('/version/edit', 'Edit', 'show|modify');
        $grid->link('/version/editsite', "新增Site", "TR");
        $grid->link('/version/editregular', "新增Regular", "TR");
        $grid->link('/version/editsvn', "新增SVN", "TR");
        $grid->link('/version/edit', "新增Patch", "TR");
        $grid->orderBy('site_id', 'asc');
        $grid->paginate(10);


        return View::make('version.version', compact('filter', 'grid'));
    }

    public function anyEdit()
    {
        if (Input::get('do_delete') == 1) return "not the first";

        $edit = DataEdit::source(new Status());
        //dd($edit);
        $edit->link("/version/list", "Back", "BL");
        $edit->link("/version/editsite", "New", "TR");
        $edit->label('Edit Patch');

        $edit->add('site_id', 'Site', 'select')->options(Site::lists("name", "id")->all());
        $edit->add('regular_id', 'Version', 'select')->options(Regular::lists("name", "id")->all());
        $svn = Svn::lists("name", "id")->all();
        asort($svn);
        //dd($a);
        $edit->add('svn', 'SVN', 'checkboxgroup')->options($svn);
        //dd(Svn::lists("name", "id"));

        $grid = DataGrid::source(Status::with('site', 'regular', 'svn'));
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('{{ $site->name }}', 'Site', 'site_id');
        $grid->add('{{ $regular->name }}', 'Regular', 'regular_id');
        $grid->add('{{ implode(", ", $svn->lists("name")->all()) }}', 'SVN');
        $grid->add('updated_at', 'Last Updated');

        $grid->edit('/version/edit', 'Edit', 'show|modify');
        $grid->orderBy('site_id', 'asc');
        $grid->paginate(10);

        return $edit->view('version.detail', compact('edit', 'grid'));
    }

    public function anyEditsite()
    {
        if (Input::get('do_delete') == 1) return "not the first";

        $edit = DataEdit::source(new Site());
        $edit->link("/version/list", "Back", "BL");
        $edit->link("/version/editsite", "New", "TR");
        $edit->label('Edit Site');
        $edit->add('name', 'Site', 'text')->rule('required');
        $edit->add('notes', 'Notes', 'text');
        $edit->add('is_active', 'Is_Active', 'checkbox');

        $grid = DataGrid::source(new Site());
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('name', 'Site');
        $grid->add('notes', 'Notes');
        $grid->add('is_active', 'Active( 1 = True, 0 = False )', 'checkbox');
        $grid->edit('/version/site', 'Edit', 'show|modify');
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        return $edit->view('version.detail', compact('edit', 'grid'));
    }

    public function anySite()
    {
        if (Input::get('do_delete') == 1) return "not the first";

        $edit = DataEdit::source(new Site());
        $edit->link("/version/editsite", "Back", "BL")->back();
        $edit->label('Edit Site');
        $edit->add('name', 'Site', 'text')->rule('required');
        $edit->add('notes', 'Notes', 'text');
        $edit->add('is_active', 'Is_Active', 'checkbox');

        $grid = DataGrid::source(new Site());
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('name', 'Site');
        $grid->add('notes', 'Notes');
        $grid->add('is_active', 'Active( 1 = True, 0 = False )', 'checkbox');
        $grid->edit('/version/detail', 'Edit', 'show|modify');
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        return $edit->view('version.detail', compact('edit', 'grid'));
    }

    public function anyEditregular()
    {
        if (Input::get('do_delete') == 1) return "not the first";

        $edit = DataEdit::source(new Regular());
        $edit->link("/version/list", "Back", "BL");
        $edit->link("/version/editregular", "New", "TR");
        $edit->label('Edit Regular');
        $edit->add('name', 'Name', 'text')->rule('required');
        $edit->add('notes', 'Notes', 'text');

        $grid = DataGrid::source(new Regular());
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('name', 'Site');
        $grid->add('notes', 'Notes');
        $grid->edit('/version/regular', 'Edit', 'show|modify');
        $grid->orderBy('id', 'asc');
        $grid->paginate(10);

        return $edit->view('version.detail', compact('edit', 'grid'));
    }

    public function anyRegular()
    {
        if (Input::get('do_delete') == 1) return "not the first";

        $edit = DataEdit::source(new Regular());
        $edit->link("/version/editregular", "Back", "BL")->back();
        $edit->label('Edit Regular');
        $edit->add('name', 'Name', 'text')->rule('required');
        $edit->add('notes', 'Notes', 'text');

        $grid = DataGrid::source(new Regular());
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('name', 'Site');
        $grid->add('notes', 'Notes');
        $grid->edit('/version/detail', 'Edit', 'show|modify');
        $grid->orderBy('id', 'desc');
        $grid->paginate(10);

        return $edit->view('version.detail', compact('edit', 'grid'));
    }

    public function anyEditsvn()
    {
        if (Input::get('do_delete') == 1) return "not the first";

        $edit = DataEdit::source(new Svn());
        $edit->link("/version/list", "Back", "BL");
        $edit->link("/version/editsvn", "New", "TR");
        $edit->label('Edit Svn');
        $edit->add('name', 'SVN', 'text')->rule('required');
        $edit->add('notes', 'Notes', 'text');

        $grid = DataGrid::source(new Svn());
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('name', 'SVN');
        $grid->add('notes', 'Notes');
        $grid->edit('/version/svn', 'Edit', 'show|modify');
        $grid->orderBy('name', 'asc');
        $grid->paginate(10);

        return $edit->view('version.detail', compact('edit', 'grid'));
    }

    public function anySvn()
    {
        if (Input::get('do_delete') == 1) return "not the first";

        $edit = DataEdit::source(new Svn());
        $edit->link("/version/editsvn", "Back", "BL")->back();
        $edit->label('Edit Svn');
        $edit->add('name', 'Name', 'text')->rule('required');
        $edit->add('notes', 'Notes', 'text');

        $grid = DataGrid::source(new Svn());
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('name', 'SVN');
        $grid->add('notes', 'Notes');
        $grid->edit('/version/detail', 'Edit', 'show|modify');
        $grid->orderBy('name', 'asc');
        $grid->paginate(10);

        return $edit->view('version.detail', compact('edit', 'grid'));
    }
}
