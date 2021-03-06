<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Auth::check())
    <meta name="user-id" content="{{ Auth::user()->id }}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Dashboard</title>
</head>
<body>
    <div id="app">
        <nav-tile :hasBox="false"></nav-tile>
        <main class="dashboard-box mt-2">
        <dashboard></dashboard>
        <flash-message></flash-message>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>