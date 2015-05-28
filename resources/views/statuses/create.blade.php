@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'statuses.store']) !!}

        @include('statuses.fields')

    {!! Form::close() !!}
</div>
@endsection
