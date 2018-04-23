<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">

    <link href="{{ asset('css/spa.css') }}" rel="stylesheet">

    <title>ESportAlliance</title>
</head>
<body>
    <div id="app">
        <app-container></app-container>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
