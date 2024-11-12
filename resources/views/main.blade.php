<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap&family=Orbitron&display=swap" rel="stylesheet">
    <script src="{{ asset('javascript/index.js') }}" defer></script>
    <script src="{{ asset('javascript/post.js') }}" defer></script>
    <script src="{{ asset('javascript/edit_post.js') }}" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
    <nav>
        @include('navbar')
    </nav>

    @yield('content')

</body>
</html>
