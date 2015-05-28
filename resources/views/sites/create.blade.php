@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'sites.store']) !!}

        @include('sites.fields')

    {!! Form::close() !!}
</div>
@endsection
