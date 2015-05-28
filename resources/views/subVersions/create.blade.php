@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'subVersions.store']) !!}

        @include('subVersions.fields')

    {!! Form::close() !!}
</div>
@endsection
