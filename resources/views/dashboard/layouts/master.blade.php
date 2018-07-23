<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @include('dashboard.partials.css')

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('dashboard.partials.header')

    @include('dashboard.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @include('dashboard.partials.flash-message')

        @yield('content')

    </div>
    <!-- /.content-wrapper -->

    @include('dashboard.partials.footer')

    @include('dashboard.partials.control-sidebar')

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('dashboard.partials.js')

</body>
</html>
