<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src = "{{ mix('js/app.js') }}" ></script>
    <title>Laravel App - @yield('title')</title>
</head>
<body>
    <div>
        <div>
            @if(session('status'))
            <span style="background:red;color:white">
                {{ session('status') }}
            </span>
            @endif
        </div>
        @yield('content')
    </div>
</body>
</html>