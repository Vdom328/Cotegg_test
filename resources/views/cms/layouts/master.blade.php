<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="" />
    <!-- BEGIN: Page Title-->
    <title>@yield('title') - Hotel booking</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{ asset('/') }}">
    {{-- css --}}
    <!-- BEGIN: Custom CSS-->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link type="image/x-icon" rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/jquery.growl/jquery.growl.css') }}">

    @vite([
        'resources/css/style.css',
        'resources/js/common.js'
    ])

    @yield('css')


    <!-- END: Global JS-->

</head>

<body class="page-footer-fixed">
    <div id="spinner" style="display:none;">
        <i class="fa fa-spinner fa-spin"></i>
    </div>
    <!--================================-->
    <!-- Page Container Start -->
    <!--================================-->
    <div class="page-container">
        <!--/ Page Sidebar End -->
        <!--================================-->
        <!-- Page Content Start -->
        <!--================================-->
        @include('cms.layouts.partials.siderbar')
        <div class="page-content">
            <!--================================-->
            <!-- Page Header Start -->
            <!--================================-->
            @include('cms.layouts.partials.header')
            <!--/ Page Header End -->
            <!--================================-->
            <!-- Page Inner Start -->
            <!--================================-->
            @yield('content')
            <!--/ Page Inner End -->
            <!--================================-->
        </div>
        <!--/ Page Content End -->
    </div>
    <!--/ Page Container End -->
    <!-- Scroll To Top Start-->
    <!--================================-->
    <a href="" data-click="scroll-top" class="btn-scroll-top fade waves-effect"><i data-feather="arrow-up"
            class="wd-16"></i></a>
    <!--/ Scroll To Top End -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/plugin-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/adata-init.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.growl/jquery.growl.js') }}"></script>

    @include('cms.layouts.partials.message')
    @yield('js')
</body>

</html>
