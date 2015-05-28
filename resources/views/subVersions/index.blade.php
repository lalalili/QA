@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">SubVersions</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('subVersions.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($subVersions->isEmpty())
                <div class="well text-center">No SubVersions found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Version Id</th>
			<th>Name</th>
			<th>Notes</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($subVersions as $subVersion)
                        <tr>
                            <td>{!! $subVersion->version_id !!}</td>
					<td>{!! $subVersion->name !!}</td>
					<td>{!! $subVersion->notes !!}</td>
                            <td>
                                <a href="{!! route('subVersions.edit', [$subVersion->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('subVersions.delete', [$subVersion->id]) !!}" onclick="return confirm('Are you sure wants to delete this SubVersion?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection