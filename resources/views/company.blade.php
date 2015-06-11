@extends('app')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Migoapp</div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Site</th>
                                    <th>Acct_company_id</th>
                                    <th>Name(登入)</th>
                                    <th>Code(Mongo)</th>
                                    <th>display_name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td>{{$data->site}}</td>
                                        <td>{{$data->acct_company_id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->code}}</td>
                                        <td>{{$data->display_name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <form role="form" action="{{url('/company')}}" method="POST" enctype="multipart/form-data"
                  accept-charset="UTF-8">
                <div class="form-group">
                    <div class="col-lg-3">
                        <label>Chose File</label>
                        <input type="file" name="upload">
                    </div>
                </div>
                <div class="col-lg-2">
                    <label></label>

                    <div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-default" type="submit">Upload</button>
                        <button class="btn btn-default" type="reset">Reset</button>
                    </div>
                    <div><h1></h1></div>
                </div>
            </form>
            @include('flash::message')
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection