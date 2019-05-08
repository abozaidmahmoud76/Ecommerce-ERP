<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! !empty($title)?$title :'admin panel' !!}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('design/admin/css/upload_style.css')}}">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')}}">

@if(direction()=='rtl')
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/dist/rtl/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/dist/rtl/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/dist/rtl/css/rtl.css')}}">
   <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">    <style>
        html,body{
            font-family: 'Cairo', cursive;
        }
    </style>


@else
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/dist/css/AdminLTE.min.css')}}">
@endif
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('design/AdminLTE/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('design/admin/css/sidemenu_style.css')}}">
    <link rel="stylesheet" href="{{asset('design/admin/jstree/dist/themes/default/style.min.css')}}" />
    @stack('css')
    @yield('style_css')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">