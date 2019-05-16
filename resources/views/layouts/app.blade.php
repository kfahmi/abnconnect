<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Apr 2017 14:33:26 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>@if (trim($__env->yieldContent('page-title'))) @yield('page-title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('elite/assets/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('elite/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css')}}" rel="stylesheet">
        
    @yield('style-page')

    <style type="text/css">
        [data-letters]:before {
          content:attr(data-letters);
          display:inline-block;
          font-size:1em;
          width:2.5em;
          height:2.5em;
          line-height:2.5em;
          text-align:center;
          border-radius:50%;
          background:grey;
          vertical-align:middle;
          margin-right:1em;
          color:white;
          }
    </style>

    <!-- Menu CSS -->
    <link href="{{asset('elite/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{asset('elite/plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{asset('elite/assets/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('elite/assets/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{asset('elite/assets/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    
</head>
<body style="background:url('bigdata.jpeg');background-size: cover;" class="content-wrapper">

        @if(Auth::check())
        <div id="wrapper">

            <!-- NAV -->
            @include('partial.nav')

            <!-- NAVBAR -->
            @include('partial.sidebar')

            <div id="page-wrapper">

                <div class="container-fluid">
                @yield('breadcrumbs')

                @include('partial.form-status')

                @yield('content')

                </div>

            <!-- FOOTER -->
                @include('partial.footer')


            </div>

        </div>
        @else

        @include('partial.form-status')
        @yield('content')

        @endif




   <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{asset('elite/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('elite/assets/bootstrap/dist/js/tether.min.js')}}"></script>
    <script src="{{asset('elite/assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('elite/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{asset('elite/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{asset('elite/assets/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('elite/assets/js/waves.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('elite/assets/js/custom.min.js')}}"></script>
    <!--Style swticher -->
    <script src="{{asset('elite/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>

    @yield('script-page')
   
</body>
</html>
