@extends('app')

@section('content')
    <div id="wrapper">
        <!-- Navigation -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="page-header">2015 4月 Regular Patch 版本 SVN #1891</h4>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Emergency Patch
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Site</th>
                                        <th>Main</th>
                                        <th>Patch</th>
                                        <th>Last Updated</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($statuses as $status)
                                        <tr>
                                            <td>{{$status->id}}</td>
                                            <td>{{$status->name}}</td>
                                            <td>{{$status->version}}</td>
                                            <td>{{$status->patch}}</td>
                                            <td>{{$status->updated_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <div class="well">
                            <p>
                                <a class="btn btn-default btn-lg btn-block" href="log/updatelog.txt" target="_blank">詳細更新資訊</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection