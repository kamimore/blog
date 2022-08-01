<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <title>Laravel App - @yield('title')</title>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">
        <h3 class="my-0 me-md-auto font-weight-normal">Laravel App</h3>
        <nav class="my-2 my-md-0 me-md-3">
            <a href="{{ route('home.index') }}" class="p-2 text-dark text-decoration-none text-wrap">Home</a>
            <a href="{{ route('home.contact') }}" class="p-2 text-dark text-decoration-none text-wrap" >Contact</a>
            <a href="{{ route('post.index') }}" class="p-2 text-dark text-decoration-none text-wrap" >Blog Posts</a>
            <a href="{{ route('post.create') }}" class="p-2 text-dark text-decoration-none text-wrap" >Add Blog Post</a>
        </nav>
    </div>
    <div class="container">
        <div>
            @if (session('status'))
                <span class="alert alert-success">
                    {{ session('status') }}
                </span>
            @endif
        </div>
        @yield('content')
    </div>
</body>

</html>
