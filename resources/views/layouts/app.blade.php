<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">       
      @include("inc.navbar")
        <div class="container py-4">
            @if(session()->has("success"))
                <div class="alert alert-success">
                    {{ session()->get("success")}}
                </div>
            @endif
            @if (session()->has("info"))
                <div class="alert alert-info">
                    {{ session()->get("info")}}
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</body>
</html>
