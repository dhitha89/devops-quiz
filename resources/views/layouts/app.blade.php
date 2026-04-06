<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DevOps Quiz')</title>
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
    @stack('styles')
</head>
<body>
@yield('content')
<script src="{{ asset('js/theme.js') }}"></script>
@stack('scripts')
</body>
</html>
