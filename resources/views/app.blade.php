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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">QA Admin v2.0</a>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="version"><i class="fa fa-server fa-fw"></i> Version Status</a>
                </li>
                <li>
                    <a href="patch"><i class="fa fa-check-square-o fa-fw"></i> Patch Test</a>
                </li>
                <li>
                    <a href="diy"><i class="fa fa-bar-chart fa-fw"></i> Mongo通</a>
                </li>
                <li>
                    <a href="system"><i class="fa fa-wrench fa-fw"></i> QA System</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
@yield('content')
<!-- jQuery Version 1.11.0 -->
<script src="{{ asset('/js/jquery-1.11.0.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('/js/plugins/metisMenu/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('/js/sb-admin-2.js') }}"></script>

<!-- BAT JavaScript -->
<script src="{{ asset('/js/bat.js') }}"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>
</body>

</html>