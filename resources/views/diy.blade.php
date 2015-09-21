@extends('app')

@section('content')
        <!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <form role="form" action="{{url('/diy')}}" method="POST">
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
                    <label>StoreID: (ablejeans^特殊渠道^特殊渠道)</label>
                    <input name="StoreID" class="form-control" placeholder="" value="{{ $StoreID }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-2">
                    <label>PeriodType: (L31D)</label>
                    <input name="PeriodType" class="form-control" placeholder="" value="{{ $PeriodType }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-2">
                    <label>CalDate: (2015-01-31)</label>
                    <input name="CalDate" class="form-control" placeholder="" value="{{ $CalDate }}">
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
        <div class="col-lg-2">
            <div class="panel panel-new">
                <div class="panel-heading"> 新手會員</div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-e0">
                <div class="panel-heading"> 主力會員</div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-s1">
                <div class="panel-heading"> 瞌睡會員</div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-s2">
                <div class="panel-heading"> 半睡會員</div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel panel-s3">
                <div class="panel-heading"> 沉睡會員</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['ValidChangeNumber']['N']['4']) }}">
                <div class="panel-body">
                    <p>人 數: {{$report['ValidChangeNumber']['0']}}</p>

                    {{--<p>Alert: {{$alert['ValidChangeNumber']['N']['4']}}</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['ValidChangeNumber']['E0']['4']) }}">
                <div class="panel-body">
                    <p>人 數: {{$report['ValidChangeNumber']['1']}}</p>

                    {{--<p>Alert: {{$alert['ValidChangeNumber']['E0']['4']}}</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['ValidChangeNumber']['S1']['4']) }}">
                <div class="panel-body">
                    <p>人 數: {{$report['ValidChangeNumber']['2']}}</p>

                    {{--<p>Alert: {{$alert['ValidChangeNumber']['S1']['4']}}</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['ValidChangeNumber']['S2']['4']) }}">
                <div class="panel-body">
                    <p>人數: {{$report['ValidChangeNumber']['3']}}</p>

                    {{--<p>Alert: {{$alert['ValidChangeNumber']['S2']['4']}}</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['ValidChangeNumber']['S3']['4']) }}">
                <div class="panel-body">
                    <p>人 數: {{$report['ValidChangeNumber']['4']}}</p>

                    {{--<p>Alert: {{$alert['ValidChangeNumber']['S3']['4']}}</p>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="panel {{$diy->alert_formatter($alert['AddedRate']['N']['4'])}}">
                <div class="panel-body">
                    <p>新增率: {{$diy->percent_formatter($report['AddedRate']['0'])}} %</p>

                    <p>環 比: {{$diy->percent_formatter($alert['AddedRate']['N']['3'])}} %</p>

                    <p>同 比: {{$diy->percent_formatter($alert['AddedRate']['N']['2'])}} %</p>

                    {{--<p>Alert: {{$alert['AddedRate']['N']['4']}}</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['AddedRate']['E0']['4']) }}">
                <div class="panel-body">
                    <p>變動率: {{$diy->percent_formatter($report['AddedRate']['1'])}} %</p>

                    <p>環 比: {{$diy->percent_formatter($alert['AddedRate']['E0']['3'])}} %</p>

                    <p>同 比: {{$diy->percent_formatter($alert['AddedRate']['E0']['2'])}} %</p>

                    {{--<p>Alert: {{$alert['AddedRate']['E0']['4']}}</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-2">

        </div>
        <div class="col-lg-2">

        </div>
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['ChurnRate']['S3']['4']) }}">
                <div class="panel-body">
                    <p>流失率: {{$diy->percent_formatter($report['ChurnRate']['4'])}} %</p>

                    <p>環 比: {{$diy->percent_formatter($alert['ChurnRate']['S3']['3'])}} %</p>

                    <p>同 比: {{$diy->percent_formatter($alert['ChurnRate']['S3']['2'])}} %</p>

                    {{--<p>Alert: {{$alert['ChurnRate']['S3']['4']}}</p>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['ConversionRate']['N']['4']) }}">
                <div class="panel-body">
                    <p>轉化率: {{$diy->percent_formatter($report['ConversionRate']['0'])}} %</p>

                    <p>環 比: {{$diy->percent_formatter($alert['ConversionRate']['N']['3'])}} %</p>

                    <p>同 比: {{$diy->percent_formatter($alert['ConversionRate']['N']['2'])}} %</p>

                    {{--<p>Alert: {{$alert['ConversionRate']['N']['4']}}</p>--}}

                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['Active']['E0']['4']) }}">
                <div class="panel-body">
                    <p>活躍度: {{$diy->percent_formatter($report['Active']['1'])}} %</p>

                    <p>環 比: {{$diy->percent_formatter($alert['Active']['E0']['3'])}} %</p>

                    <p>同 比: {{$diy->percent_formatter($alert['Active']['E0']['2'])}} %</p>

                    {{--<p>Alert: {{$alert['Active']['E0']['4']}}</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['WakeUpRate']['S1']['4']) }}">
                <div class="panel-body">
                    <p>喚醒率: {{$diy->percent_formatter($report['WakeUpRate']['2'])}} %</p>

                    <p>環 比: {{$diy->percent_formatter($alert['WakeUpRate']['S1']['3'])}} %</p>

                    <p>同 比: {{$diy->percent_formatter($alert['WakeUpRate']['S1']['2'])}} %</p>

                    {{--<p>Alert: {{$alert['WakeUpRate']['S1']['4']}}</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['WakeUpRate']['S2']['4']) }}">
                <div class="panel-body">
                    <p>喚醒率: {{$diy->percent_formatter($report['WakeUpRate']['3'])}} %</p>

                    <p>環 比: {{$diy->percent_formatter($alert['WakeUpRate']['S2']['3'])}} %</p>

                    <p>同 比: {{$diy->percent_formatter($alert['WakeUpRate']['S2']['2'])}} %</p>

                    {{-- <p>Alert: {{$alert['WakeUpRate']['S2']['4']}}</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['WakeUpRate']['S3']['4']) }}">
                <div class="panel-body">
                    <p>喚醒率: {{$diy->percent_formatter($report['WakeUpRate']['4'])}} %</p>

                    <p>環 比: {{$diy->percent_formatter($alert['WakeUpRate']['S3']['3'])}} %</p>

                    <p>同 比: {{$diy->percent_formatter($alert['WakeUpRate']['S3']['2'])}} %</p>

                    {{--<p>Alert: {{$alert['WakeUpRate']['S3']['4']}}</p>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="panel {{ $diy->alert_formatter($alert['ARPU']['N']['4']) }}">
                <div class="panel-body">
                    <p>客單價: {{$diy->arpu_formatter($report['ARPU']['0'])}}</p>

                    <p>環 比: {{$diy->percent_formatter($alert['ARPU']['N']['3'])}} %</p>

                    <p>同 比: {{$diy->percent_formatter($alert['ARPU']['N']['2'])}} %</p>

                    {{--<p>Alert: {{$alert['ARPU']['N']['4']}}</p>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="panel  {{ $diy->alert_formatter($alert['ARPU']['E0']['4']) }}">
                <div class="panel-body">
                    <p>客單價: {{$diy->arpu_formatter($report['ARPU']['1'])}}</p>

                    <p>環 比: {{$diy->percent_formatter($alert['ARPU']['E0']['3'])}} %</p>

                    <p>同 比: {{$diy->percent_formatter($alert['ARPU']['E0']['2'])}} %</p>

                    {{--<p>Alert: {{$alert['ARPU']['E0']['4']}}</p>--}}
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
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-new">
                <div class="panel-heading"> DIYReport</div>
                <div class="panel-body">
                        <pre>
                        {{ var_dump($DIYReports) }}
                        </pre>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-new">
                <div class="panel-heading"> KPIAlert</div>
                <div class="panel-body">
                        <pre>
                        {{ var_dump($KPIAlerts) }}
                        </pre>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection