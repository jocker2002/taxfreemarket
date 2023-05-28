<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store" />

    @yield('page_meta')

    <title>@yield('page_title') | Tax Free Market</title>
    <link rel="icon" href="/img/logo.ico">

    @yield('page_css')
    @yield('page_libs')
    @yield('page_plugins')
    
</head>

<body>

    @yield('content_before-main')

    <div class="main">

        @if ($_SERVER['REQUEST_URI'] != "/")
            @include('layouts.header')
        @endif

        @yield('content_main')

        @include('layouts.footer')
        
    </div>
@yield('page_js')
</body>

</html>