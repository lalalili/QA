@extends('app')

@section('content')
    <div id="wrapper">
        <!-- Navigation -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!--<h4 class="page-header">-->
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if (is_null($tw_last))
                                TW Report ( updated_at： )<br>
                            @else
                                TW Report ( updated_at：{{ $tw_last->updated_at}} )<br>
                            @endif
                            Known Error：MIGO, kg, newbalancewifi, niceday, 86shop
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
                                        <th>UI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse( $tw_reports  as $tw_report)
                                        <tr>
                                            <td>{{ $tw_report->note2 }}</td>
                                            <td>{{ $tw_report->company }}</td>
                                            <td>{{ $tw_report->result }}</td>
                                            <td>{{ $tw_report->note1 }}</td>
                                            <td>{{ $tw_report->note3 }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @if (is_null($cn_first))
                                CN Report ( updated_at： )<br>
                            @else
                            CN Report ( updated_at：{{ $cn_first->updated_at }} )<br>
                            @endif
                            Known Error：MIGO
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
                                        <th>UI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse( $cn_reports  as $cn_report)
                                        <tr>
                                            <td>{{ $cn_report->note2 }}</td>
                                            <td>{{ $cn_report->company }}</td>
                                            <td>{{ $cn_report->result }}</td>
                                            <td>{{ $cn_report->note1 }}</td>
                                            <td>{{ $cn_report->note3 }}</td>
                                        </tr>
                                    @empty
                                    @endforelse
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