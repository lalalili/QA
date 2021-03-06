<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QA Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('/css/plugins/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Social Buttons CSS -->
    <link href="{{ asset('/css/plugins/social-buttons.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('/font/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

{!! Rapyd::styles() !!}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/.env.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{url('/')}}">QA Admin</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                <i class="fa fa-wrench fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="{{url('/bday/list')}}">
                        <div>
                            <i class="fa fa-birthday-cake fa-fw"></i> 生日祝福名單
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{url('/phpmyadmin/')}}" target="_blank">
                        <div>
                            <i class="fa fa-qq fa-fw"></i> phpMyAdmin
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.dropdown-alerts -->
        </li>
        @if(Auth::check())
            {{Auth::getUser()['name']}}
        @else
            Guest
        @endif
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="fa fa-user fa-fw"></i>
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                @if (Auth::check())
                    <li>
                        <a href="{{url('/auth/logout')}}">
                            <i class="fa fa-sign-out fa-fw"></i>
                            Logout
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{url('/auth/login')}}">
                            <i class="fa fa-sign-in fa-fw"></i>
                            Login
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="#">
                        <i></i>
                        FAE
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/version/list')}}"><i class="fa fa-server fa-fw"></i> Patch Status</a>
                        </li>
                        <li>
                            <a href="{{url('/patch')}}"><i class="fa fa-check-square-o fa-fw"></i> Patch Test</a>
                        </li>
                        <li>
                            <a href="http://faq.migosoft.com" target="_blank"><i class="fa fa-pencil-square-o"
                                                                                 aria-hidden="true"></i> FAQ</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i></i>
                        QA
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/test/report')}}"><i class="fa fa-bar-chart fa-fw"></i> DI自動測試</a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="{{url('/task')}}"><i class="fa fa-bar-chart fa-fw"></i> BackOffice</a>--}}
                        {{--</li>--}}
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i></i>
                        Trello
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level" style="">
                        <li>
                            <a href="https://trello.com/b/MSh6I9n4/fae-qa" target="_blank">QA</a>
                        </li>
                        <li>
                            <a href="https://trello.com/b/JTbgJOQW/-" target="_blank">店客通</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="http://support.migocorp.com:8080" target="_blank"><i></i> Jira</a>
                </li>
                <li>
                    <a href="#">
                        <i></i>
                        備份
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level" style="">
                        <li>
                            <a href="#">
                                <i class="fa fa-fw"></i>
                                Vue
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-third-level" style="">
                                <li>
                                    <a href="{{url('/task')}}"> BackOffice</a>
                                </li>
                                <li>
                                    <a href="{{url('/vue')}}"> Test</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="http://kb.migosoft.com/doku.php?id=main" target="_blank"><i
                                        class="fa fa-pencil-square-o fa-fw"></i> 知識庫</a>
                        </li>
                        <li>
                            <a href="http://mantis.migosoft.com" target="_blank"><i class="fa fa-bug fa-fw"></i> Mantis</a>
                        </li>
                        <li>
                            <a href="https://www.dropbox.com/s/wsmazkbvgpk6a3c/ProjectX.docx?dl=0" target="_blank"><i
                                        class="fa fa-dropbox fa-fw"></i> ProjectX</a>
                        </li>
                        <li>
                            <a href="http://laravel.tw/docs/5.1/" target="_blank"><i
                                        class="fa fa-user-secret fa-fw"></i>
                                Laravel</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-bar-chart fa-fw"></i>
                                Mongo
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-third-level" style="">
                                <li>
                                    <a href="{{url('/diy')}}">指標</a>
                                </li>
                                <li>
                                    <a href="{{url('/store')}}">門店</a>
                                </li>
                                <li>
                                    <a href="{{url('/company')}}">公司列表</a>
                                </li>
                                <li>
                                    <a href="{{url('/member')}}">會員查詢</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('/system')}}"><i class="fa fa-wrench fa-fw"></i> QA Log</a>
                        </li>
                    </ul>
                <li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
@yield('content')
<!-- jQuery Version .env.11.0 -->
<script src="{{ asset('/js/jquery-1.11.0.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('/js/plugins/metisMenu/metisMenu.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"></script>
<script src="{{ asset('js/task.js')}}" charset="utf-8"></script>


<!-- Custom Theme JavaScript -->
<script src="{{ asset('/js/sb-admin-2.js') }}"></script>

<!-- BAT JavaScript -->
<script src="{{ asset('/js/bat.js') }}"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>

{!! Rapyd::scripts() !!}

</body>

</html>