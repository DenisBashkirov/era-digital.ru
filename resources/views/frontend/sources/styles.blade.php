@if(env('APP_ENV') == 'production')
    <link rel="stylesheet" href="{{ asset('css/frontend.min.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
@endif
