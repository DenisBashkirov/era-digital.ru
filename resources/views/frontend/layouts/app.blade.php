<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#eb6418">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Балконы под ключ">
    <meta name="application-name" content="Балконы под ключ">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/mstile-144x144.png') }}">
    <meta name="msapplication-config" content="{{ asset('favicon/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">

    <title>Диджитал-маркетинг | Era Digital</title>

    @yield('page_head')

    @include('frontend.sources.styles')

    @if(env('APP_ENV') === 'production' && Cookie::get('metrics') !== 'off')
        @include('frontend.sources.services.metrics')
    @endif
    
</head>
<body>

@yield('body_content')

@include('frontend.sources.scripts.main')

@yield('page_scripts')

</body>
</html>
