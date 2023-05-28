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

    @yield('page_plugins')
</head>

<body>
    <div class="main">
        @include('layouts.header')

        <div class="d-flex" id="wrapper">

            @yield('sidebar_menu')

            @yield('content_main')

        </div>

        @include('layouts.footer')
    </div>

    @yield('page_js')

</body>

</html>