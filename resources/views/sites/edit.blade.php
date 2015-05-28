@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($site, ['route' => ['sites.update', $site->id], 'method' => 'patch']) !!}

        @include('sites.fields')

    {!! Form::close() !!}
</div>
@endsection
