@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'versions.store']) !!}

        @include('versions.fields')

    {!! Form::close() !!}
</div>
@endsection
