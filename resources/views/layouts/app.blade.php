<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timesheet</title>
    @yield('style')
    <script src="https://cdn.tailwindcss.com/"></script>
</head>
<body>
    <div class="nav-bar">@yield('nav-bar')</div>
    <div class="title">@yield('title')</div>
    <div class="content">@yield('content')</div>
    @yield('script')
</body>
</html>