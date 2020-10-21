<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>@yield('title')</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template" />
    <meta name="author" content="okler.net" />

    <!-- Favicon -->
    <!-- <link rel="shortcut icon" href="{{ url('img/favicon.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ url('img/apple-touch-icon.png') }}" /> -->
    <link rel="shortcut icon" href="{{ url('img/logo11.ico') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ url('img/logo11.png') }}" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />

    @include('includes.style')
</head>

<body>
    <div class="body">

        @yield('content')

        @include('includes.footer-alternate')
    </div>



    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>