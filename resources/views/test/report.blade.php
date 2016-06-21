@extends('app')

@section('content')
    <div id="wrapper">
        <!-- Navigation -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!--<h4 class="page-header"></h4>-->
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>TW Report</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company</th>
                                        <th>Result</th>
                                        <th>Note1</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $reports  as $report)
                                        <tr>
                                            <td><h4>{{ $report->server }}</h4></td>
                                            <td><h4>{{ $report->company }}</h4></td>
                                            <td><h4>{{ $report->result }}</h4></td>
                                            <td><h4>{{ $report->note1 }}</h4></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection