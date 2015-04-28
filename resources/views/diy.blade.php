@extends('app')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row">
            <form role="form" action="/diy" method="POST">
                <div class="form-group">
                    <div class="col-lg-4">
                        <label>StoreID</label>
                        <input name="StoreID" class="form-control" placeholder="ablejeans^特殊渠道^特殊渠道^百货商场">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label>PeriodType</label>
                        <input name="PeriodType" class="form-control" placeholder="L31D">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2">
                        <label>CalDate</label>
                        <input name="CalDate" class="form-control" placeholder="2015-01-31">
                    </div>
                </div>
                <div class="col-lg-2">
                    <label></label>

                    <div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-default" type="submit">Query</button>
                        <button class="btn btn-default" type="reset">Reset</button>
                    </div>
                    <div><h1></h1></div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="panel panel-green">
                    <div class="panel-heading"> 新手會員</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-primary">
                    <div class="panel-heading"> 主力會員</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-heading"> 瞌睡會員</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-success">
                    <div class="panel-heading"> 半睡會員</div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-danger">
                    <div class="panel-heading"> 沉睡會員</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>人數: {{$report['ValidChangeNumber']['0']}}</p>
                        <p>Alert: {{$alert['ValidChangeNumber']['N']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>人數: {{$report['ValidChangeNumber']['1']}}</p>
                        <p>Alert: {{$alert['ValidChangeNumber']['E0']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>人數: {{$report['ValidChangeNumber']['2']}}</p>
                        <p>Alert: {{$alert['ValidChangeNumber']['S1']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>人數: {{$report['ValidChangeNumber']['3']}}</p>
                        <p>Alert: {{$alert['ValidChangeNumber']['S2']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>人數: {{$report['ValidChangeNumber']['4']}}</p>
                        <p>Alert: {{$alert['ValidChangeNumber']['S3']['4']}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>新增率: {{$report['AddedRate']['0']}}</p>
                        <p>環比: {{$alert['AddedRate']['N']['3']}}</p>
                        <p>同比: {{$alert['AddedRate']['N']['2']}}</p>
                        <p>Alert: {{$alert['AddedRate']['N']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>變動率: {{$report['AddedRate']['1']}}</p>
                        <p>環比: {{$alert['AddedRate']['E0']['3']}}</p>
                        <p>同比: {{$alert['AddedRate']['E0']['2']}}</p>
                        <p>Alert: {{$alert['AddedRate']['E0']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">

            </div>
            <div class="col-lg-2">

            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>流失率: {{$report['ChurnRate']['4']}}</p>
                        <p>環比: {{$alert['ChurnRate']['S3']['3']}}</p>
                        <p>同比: {{$alert['ChurnRate']['S3']['2']}}</p>
                        <p>Alert: {{$alert['ChurnRate']['S3']['4']}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>轉化率: {{$report['ConversionRate']['0']}}</p>
                        <p>環比: {{$alert['ConversionRate']['N']['3']}}</p>
                        <p>同比: {{$alert['ConversionRate']['N']['2']}}</p>
                        <p>Alert: {{$alert['ConversionRate']['N']['4']}}</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>活躍度: {{$report['Active']['1']}}</p>
                        <p>環比: {{$alert['Active']['E0']['3']}}</p>
                        <p>同比: {{$alert['Active']['E0']['2']}}</p>
                        <p>Alert: {{$alert['Active']['E0']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>喚醒率: {{$report['WakeUpRate']['2']}}</p>
                        <p>環比: {{$alert['WakeUpRate']['S1']['3']}}</p>
                        <p>同比: {{$alert['WakeUpRate']['S1']['2']}}</p>
                        <p>Alert: {{$alert['WakeUpRate']['S1']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>喚醒率: {{$report['WakeUpRate']['3']}}</p>
                        <p>環比: {{$alert['WakeUpRate']['S2']['3']}}</p>
                        <p>同比: {{$alert['WakeUpRate']['S2']['2']}}</p>
                        <p>Alert: {{$alert['WakeUpRate']['S2']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>喚醒率: {{$report['WakeUpRate']['4']}}</p>
                        <p>環比: {{$alert['WakeUpRate']['S3']['3']}}</p>
                        <p>同比: {{$alert['WakeUpRate']['S3']['2']}}</p>
                        <p>Alert: {{$alert['WakeUpRate']['S3']['4']}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>客單價: {{$report['ARPU']['0']}}</p>
                        <p>環比: {{$alert['ARPU']['N']['3']}}</p>
                        <p>同比: {{$alert['ARPU']['N']['2']}}</p>
                        <p>Alert: {{$alert['ARPU']['N']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <p>客單價: {{$report['ARPU']['1']}}</p>
                        <p>環比: {{$alert['ARPU']['E0']['3']}}</p>
                        <p>同比: {{$alert['ARPU']['E0']['2']}}</p>
                        <p>Alert: {{$alert['ARPU']['E0']['4']}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">

            </div>
            <div class="col-lg-2">

            </div>
            <div class="col-lg-2">

            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection