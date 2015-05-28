@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($subVersion, ['route' => ['subVersions.update', $subVersion->id], 'method' => 'patch']) !!}

        @include('subVersions.fields')

    {!! Form::close() !!}
</div>
@endsection
