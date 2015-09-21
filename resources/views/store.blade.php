@extends('app')

@section('content')
        <!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <form role="form" action="{{url('/store')}}" method="POST">
            <div class="form-group">
                <div class="col-lg-1">
                    <label>Server</label>
                    <select name="Server" class="form-control">
                        <option value="CN" {{ isset($cn) ? 'selected=selected' : '' }}>CN</option>
                        <option value="TW" {{ isset($tw) ? 'selected="selected' : '' }}>TW</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-3">
                    <label>ShopID: (grandpacific)</label>
                    <input name="ShopID" class="form-control" placeholder="" value="{{ $ShopID }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-2">
                    <label>StoreName: (黄金)</label>
                    <input name="StoreName" class="form-control" placeholder="" value="{{ $StoreName }}">
                </div>
            </div>
            <div class="col-lg-2">
                <label>狀態： {{ $status }}</label>

                <div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button class="btn btn-default" type="submit">Query</button>
                    <button class="btn btn-default" type="reset">Reset</button>
                </div>
                <div><h1></h1></div>
            </div>
        </form>
        @include('flash::message')

    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-new">
                <div class="panel-heading"> 會員資料</div>
                <div class="panel-body">
                    {{ $StoreID }}
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection