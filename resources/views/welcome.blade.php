<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ mix('css/app.css') }}?t={{date('Ymd')}}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div id="app">
            <example-component />
        </div>

        <script src="{{ mix('js/app.js') }}?t={{date('Ymd')}}"></script>
    </body>
</html>
