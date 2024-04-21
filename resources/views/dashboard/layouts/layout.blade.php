<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title')</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('admin/fonts/SansPro/SansPro.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap_rtl-v4.2.1/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap_rtl-v4.2.1/custom_rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/dataTables.bootstrap5.css')}}"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('style')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
       @include('dashboard.layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
       @include('dashboard.layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <x-app-layout>
        @yield('content')
        </x-app-layout>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('dashboard.layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('admin/js/dataTables.js') }}"></script>
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript"  src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


    @yield('script')
</body>

</html>
