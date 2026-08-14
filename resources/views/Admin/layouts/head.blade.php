<head>
    <meta charset="utf-8"/>
    <title>HMBUILDERS | @yield('page-title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="base_url" content="{{ url('/') }}">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/fav.png')}}">

    <!-- third party css -->
    <link href="{{asset('css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/vendor/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/vendor/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/vendor/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/vendor/select.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Datatables css -->
    <link href="{{asset('css/vendor/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/vendor/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">


    <!-- third party css end -->

    <!-- App css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/flaticon.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{asset('css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style"/>

    <link href="{{asset('css/common.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    
</head>
