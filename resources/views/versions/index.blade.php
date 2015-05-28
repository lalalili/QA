@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Versions</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('versions.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($versions->isEmpty())
                <div class="well text-center">No Versions found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
			<th>Notes</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($versions as $version)
                        <tr>
                            <td>{!! $version->name !!}</td>
					<td>{!! $version->notes !!}</td>
                            <td>
                                <a href="{!! route('versions.edit', [$version->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('versions.delete', [$version->id]) !!}" onclick="return confirm('Are you sure wants to delete this Version?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection