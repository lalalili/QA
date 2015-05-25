@extends('app')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                {!! $filter !!}
                {!! $grid !!}
            </div>
        </div>
    </div>
@endsection