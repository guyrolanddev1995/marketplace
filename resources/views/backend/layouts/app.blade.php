<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('settings.site_title') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("backend/bower_components/Ionicons/css/ionicons.min.css") }}">
  <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css"/>
  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/css/AdminLTE.min.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/css/skins/skin-green.min.css') }}">

  <link rel="icon" href="{{ asset('storage/'.config('settings.site_favicon')) }}">
  
  <livewire:styles />

  @yield('styles')


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper" id="app">

  <!-- Main Header -->
    @include('backend.partials.header')

  <!-- Left side column. contains the logo and sidebar -->
    @include('backend.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  
  <div class="control-sidebar-bg"></div>
</div>

    <script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/ayxl1uttmdfi98mz9g4snrn3k1td4mwfp19ol92yruhnn9ee/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <livewire:scripts />

    @yield('scripts')
</body>
</html>