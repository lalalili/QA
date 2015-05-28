@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Statuses</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('statuses.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($statuses->isEmpty())
                <div class="well text-center">No Statuses found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Site Id</th>
			<th>Version Id</th>
			<th>Subversion Id</th>
			<th>Notes</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($statuses as $status)
                        <tr>
                            <td>{!! $status->site_id !!}</td>
					<td>{!! $status->version_id !!}</td>
					<td>{!! $status->subversion_id !!}</td>
					<td>{!! $status->notes !!}</td>
                            <td>
                                <a href="{!! route('statuses.edit', [$status->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('statuses.delete', [$status->id]) !!}" onclick="return confirm('Are you sure wants to delete this Status?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection