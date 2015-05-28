@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($version, ['route' => ['versions.update', $version->id], 'method' => 'patch']) !!}

        @include('versions.fields')

    {!! Form::close() !!}
</div>
@endsection
