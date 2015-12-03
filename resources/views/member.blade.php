@extends('app')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row">
            <form role="form" action="{{url('/member')}}" method="POST">
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
                    <div class="col-lg-2">
                        <label>ShopID: (zhoushanxm)</label>
                        <input name="ShopID" class="form-control" placeholder="" value="{{ $ShopID }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label>會員編號: (2216000327773)</label>
                        <input name="MemberID" class="form-control" placeholder="" value="{{ $MemberID }}">
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
                        <pre>
                        {{ var_dump($Member) }}
                        </pre>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-new">
                        <div class="panel-heading"> 全公司缺失資料總覽</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>屬性</th>
                                        <th>筆數</th>
                                        <th>比例</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>會員總數</td>
                                        <td>{{ $Count }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>姓名(MemberName)缺失</td>
                                        <td>{{ $countMemberName }}</td>
                                        <td>{{ $percentMemberName }} %</td>
                                    </tr>
                                    <tr>
                                        <td>性別(Gender)缺失</td>
                                        <td>{{ $countGender }}</td>
                                        <td>{{ $percentGender }} %</td>
                                    </tr>
                                    <tr>
                                        <td>生日(Birthday)缺失</td>
                                        <td>{{ $countBirthday }}</td>
                                        <td>{{ $percentBirthday }} %</td>
                                    </tr>
                                    <tr>
                                        <td>手機(Cellphone)缺失</td>
                                        <td>{{ $countCellphone }}</td>
                                        <td>{{ $percentCellphone }} %</td>
                                    </tr>
                                    <tr>
                                        <td>電子郵件(Email)缺失</td>
                                        <td>{{ $countEmail }}</td>
                                        <td>{{ $percentEmail }} %</td>
                                    </tr>
                                    <tr>
                                        <td>身分證號(UID)缺失</td>
                                        <td>{{ $countID }}</td>
                                        <td>{{ $percentID }} %</td>
                                    </tr>
                                    <tr>
                                        <td>Wechat(OpenID)缺失</td>
                                        <td>{{ $countOpenID }}</td>
                                        <td>{{ $percentOpenID }} %</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection