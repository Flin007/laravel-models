<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Google Fonts Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&display=swap"
          rel="stylesheet">
    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400&display=swap" rel="stylesheet">
    <!-- Normolize.css -->
    <link rel="stylesheet" href="{{ asset('personalFiles/css/normolize.css') }}">
    <!-- Slick slider -->
    <link rel="stylesheet" href="{{ asset('personalFiles/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('personalFiles/plugins/slick/slick-theme.css') }}">
    <!-- Common css file -->
    <link rel="stylesheet" href="{{ asset('personalFiles/css/style.css') }}">
    <!-- Jq in header for correct work -->
    <script src="{{ asset('personalFiles/js/jq.js') }}"></script>
    <!-- Jq cookie -->
    <script src="{{ asset('personalFiles/js/jq-cookie.js') }}"></script>
    <title>@yield('title')</title>
</head>
<body>
<div class="wrapper">
    @yield('content')
</div>
</body>
<!-- Slick slider -->
<script src="{{ asset('personalFiles/plugins/slick/slick.min.js') }}"></script>
<!-- Main Js file -->
<script src="{{ asset('personalFiles/js/main.js') }}"></script>
</html>
