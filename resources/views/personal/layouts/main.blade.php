<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&display=swap"
          rel="stylesheet">
    <!-- Normolize.css -->
    <link rel="stylesheet" href="{{ asset('personal/css/normolize.css') }}">
    <!-- Common css file -->
    <link rel="stylesheet" href="{{ asset('personal/css/style.css') }}">
    <!-- Jq in header for correct work -->
    <script src="{{ asset('personal/js/jq.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>
<div class="wrapper">
    @yield('content')
</div>
</body>
<!-- Main Js file -->
<script src="{{ asset('personal/js/main.js') }}"></script>
</html>
