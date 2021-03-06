<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
        <title>Test App</title>
    </head>
    <body>
        <div id="app">
            <header-component></header-component>
            <router-view></router-view>
            <footer-component></footer-component>
        </div>
        <script src=" {{ mix('js/app.js') }} "></script>
    </body>
</html>
