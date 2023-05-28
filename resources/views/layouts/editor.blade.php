<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('page_meta')

    <title>@yield('page_title') | Tax Free Market</title>

    <link rel="icon" href="/img/logo.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/fancy-buttons.css">
    <link rel="stylesheet" href="/css/sidebar/sidebar.menu.css">
    <link rel="stylesheet" href="/css/sidebar/sidebar.menu.white.css">
    <link rel="stylesheet" href="/css/sidebar/sidebar.menu.dark.css">
    @yield('page_css')

    <!-- jQuery Library -->
    <script src="/libs/jquery-3.6.0.js"></script>

    <!-- Less Language -->
    <script src="/libs/less.js"></script>
    @yield('page_libs')

    <!-- Cookie Plugin -->
    <script src="/plugins/js.cookie.js"></script>

    <!-- Session Plugin -->
    <script src="/plugins/jquery.session.js"></script>

    <!-- Color Picker Plugin -->
    <link rel="stylesheet" href="/color-picker/color-picker.css">
    @yield('page_plugins')
</head>

<body>
    <!-- navbar menu -->
    <div class="navbar-container">
        <nav class="navbar navbar-expand-lg fixed-top bg-white-2">
            <a id="sidebar-title" class="navbar-brand navbar-title button-rounded" href="#">Sidebar menu</a>
            <span class="navbar-text">
                <a href="#" id="sidebar-bars" class="bars">
                    Pages
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </a>
            </span>
        </nav>
    </div>

    <div class="d-flex" id="wrapper">

        @yield('sidebar_menu')

        <div class="content store-body">
            <div class="container-fluid">

                @include('pages.store.store-header')

                @yield('store_content')

                {{-- @include('footer') --}}
            </div>
        </div>

        @yield('content_main')

    </div>

    @yield('page_js')

</body>

</html>