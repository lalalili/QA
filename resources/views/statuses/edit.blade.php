@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($status, ['route' => ['statuses.update', $status->id], 'method' => 'patch']) !!}

        @include('statuses.fields')

    {!! Form::close() !!}
</div>
@endsection
