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
                        <h4>TM (10.0.6.206) <button type="button" class="btn btn-primary" onclick="checkTM()">Check</button></h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Server</th>
                                    <th>停止排程</th>
                                    <th>開啟排程</th>
                                    <th>立即停止</th>
                                    <th>立即執行</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><h4>1</h4></td>
                                    <td><h4>TM2</h4></td>
                                    <td><button type="button" class="btn btn-warning" onclick="pauseTM2()">Pause</button></td>
                                    <td><button type="button" class="btn btn-primary" onclick="continueTM2()">Continue</button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="stopTM2()">Stop</button></td>
                                    <td><button type="button" class="btn btn-success" onclick="startTM2()">Start</button></td>
                                </tr>
                                <tr>
                                    <td><h4>2</h4></td>
                                    <td><h4>TM3</h4></td>
                                    <td><button type="button" class="btn btn-warning" onclick="pauseTM3()">Pause</button></td>
                                    <td><button type="button" class="btn btn-primary" onclick="continueTM3()">Continue</button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="stopTM3()">Stop</button></td>
                                    <td><button type="button" class="btn btn-success" onclick="startTM3()">Start</button></td>
                                </tr>
                                <tr>
                                    <td><h4>3</h4></td>
                                    <td><h4>TM4</h4></td>
                                    <td><button type="button" class="btn btn-warning" onclick="pauseTM4()">Pause</button></td>
                                    <td><button type="button" class="btn btn-primary" onclick="continueTM4()">Continue</button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="stopTM4()">Stop</button></td>
                                    <td><button type="button" class="btn btn-success" onclick="startTM4()">Start</button></td>
                                </tr>
                                <tr>
                                    <td><h4>4</h4></td>
                                    <td><h4>TM5</h4></td>
                                    <td><button type="button" class="btn btn-warning" onclick="pauseTM5()">Pause</button></td>
                                    <td><button type="button" class="btn btn-primary" onclick="continueTM5()">Continue</button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="stopTM5()">Stop</button></td>
                                    <td><button type="button" class="btn btn-success" onclick="startTM5()">Start</button></td>
                                </tr>
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
                        <h4>SM (10.0.6.207) <button type="button" class="btn btn-primary" onclick="checkSM()">Check</button></h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Server</th>
                                    <th>停止排程</th>
                                    <th>開啟排程</th>
                                    <th>立即停止</th>
                                    <th>立即執行</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><h4>1</h4></td>
                                    <td><h4>SM1</h4></td>
                                    <td><button type="button" class="btn btn-warning" onclick="pauseSM1()">Pause</button></td>
                                    <td><button type="button" class="btn btn-primary" onclick="continueSM1()">Continue</button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="stopSM1()">Stop</button></td>
                                    <td><button type="button" class="btn btn-success" onclick="startSM1()">Start</button></td>
                                </tr>
                                <tr>
                                    <td><h4>2</h4></td>
                                    <td><h4>SM2</h4></td>
                                    <td><button type="button" class="btn btn-warning" onclick="pauseSM2()">Pause</button></td>
                                    <td><button type="button" class="btn btn-primary" onclick="continueSM2()">Continue</button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="stopSM2()">Stop</button></td>
                                    <td><button type="button" class="btn btn-success" onclick="startSM2()">Start</button></td>
                                </tr>
                                <tr>
                                    <td><h4>3</h4></td>
                                    <td><h4>SM4</h4></td>
                                    <td><button type="button" class="btn btn-warning" onclick="pauseSM4()">Pause</button></td>
                                    <td><button type="button" class="btn btn-primary" onclick="continueSM4()">Continue</button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="stopSM4()">Stop</button></td>
                                    <td><button type="button" class="btn btn-success" onclick="startSM4()">Start</button></td>
                                </tr>
                                {{--<tr>--}}
                                    {{--<td><h4>4</h4></td>--}}
                                    {{--<td><h4>SM5</h4></td>--}}
                                    {{--<td><button type="button" class="btn btn-warning" onclick="pauseSM5()">Pause</button></td>--}}
                                    {{--<td><button type="button" class="btn btn-primary" onclick="continueSM5()">Continue</button></td>--}}
                                    {{--<td><button type="button" class="btn btn-danger" onclick="stopSM5()">Stop</button></td>--}}
                                    {{--<td><button type="button" class="btn btn-success" onclick="startSM5()">Start</button></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                <td><h4>DI1</h4></td>
                                <td><h4>CN</h4></td>
                                <td><button type="button" class="btn btn-success" onclick="startDICN()">Start</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>TM & SM (10.0.6.219) <button type="button" class="btn btn-primary" onclick="checkOthers()">Check</button></h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Server</th>
                                    <th>停止排程</th>
                                    <th>開啟排程</th>
                                    <th>立即停止</th>
                                    <th>立即執行</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><h4>1</h4></td>
                                    <td><h4>MIGODEMO</h4></td>
                                    <td><button type="button" class="btn btn-warning" onclick="pauseMIGODEMO()">Pause</button></td>
                                    <td><button type="button" class="btn btn-primary" onclick="continueMIGODEMO()">Continue</button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="stopMIGODEMO()">Stop</button></td>
                                    <td><button type="button" class="btn btn-success" onclick="startMIGODEMO()">Start</button></td>
                                </tr>
                                <tr>
                                    <td><h4>2</h4></td>
                                    <td><h4>ETL</h4></td>
                                    <td><button type="button" class="btn btn-warning" onclick="pauseETL()">Pause</button></td>
                                    <td><button type="button" class="btn btn-primary" onclick="continueETL()">Continue</button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="stopETL()">Stop</button></td>
                                    <td><button type="button" class="btn btn-success" onclick="startETL()">Start</button></td>
                                </tr>
                                {{--<tr>--}}
                                    {{--<td><h4>2</h4></td>--}}
                                    {{--<td><h4>SM3</h4></td>--}}
                                    {{--<td><button type="button" class="btn btn-warning" onclick="pauseSM3()">Pause</button></td>--}}
                                    {{--<td><button type="button" class="btn btn-primary" onclick="continueSM3()">Continue</button></td>--}}
                                    {{--<td><button type="button" class="btn btn-danger" onclick="stopSM3()">Stop</button></td>--}}
                                    {{--<td><button type="button" class="btn btn-success" onclick="startSM3()">Start</button></td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <td><h4>3</h4></td>
                                    <td><h4>Best13</h4></td>
                                    <td><button type="button" class="btn btn-warning" onclick="pauseBEST13()">Pause</button></td>
                                    <td><button type="button" class="btn btn-primary" onclick="continueBEST13()">Continue</button></td>
                                    <td><button type="button" class="btn btn-danger" onclick="stopBEST13()">Stop</button></td>
                                    <td><button type="button" class="btn btn-success" onclick="startBEST13()">Start</button></td>
                                </tr>
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
                        <h3>注意事項</h3>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="alert alert-info">
                            所有按鈕都會下載.bat，請下載回本機後執行 !
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection