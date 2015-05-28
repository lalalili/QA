@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Sites</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('sites.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($sites->isEmpty())
                <div class="well text-center">No Sites found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
			<th>Description</th>
			<th>Is Active</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($sites as $site)
                        <tr>
                            <td>{!! $site->name !!}</td>
					<td>{!! $site->description !!}</td>
					<td>{!! $site->is_active !!}</td>
                            <td>
                                <a href="{!! route('sites.edit', [$site->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('sites.delete', [$site->id]) !!}" onclick="return confirm('Are you sure wants to delete this Site?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection