<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('media/logo.png') }}" type="image/png">
    <title>@yield('title', 'SMART JMP')</title>
    

    {{-- Global CSS (variabel, reset, font, layout) --}}
    <link rel="stylesheet" href="{{ asset('layouts/app.css') }}">
    <link rel="stylesheet" href="{{ asset('layouts/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('layouts/topbar.css') }}">
    <meta name="theme-color" content="#0f172a">
</head>
<body>

    @yield('content')

</body>
</html>