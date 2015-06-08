@extends('app')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                {!! $filter !!}
                {!! $grid !!}
                <div class="well">
                    <p>
                        <a class="btn btn-default btn-lg btn-block" target="_blank" href="{{url('log/updatelog.txt')}}">詳細更新資訊</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection