<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="img/pen.svg">
    <title>@yield('title')</title>

</head>

<body>
    @yield('content')

    <div class="ui vertical violet inverted labeled icon left thin sidebar pointing menu">
        <a class="header item">NotAppp </a>
        @if (Auth::user()->id_perfil === 1)

            <a href="{{ route('home') }}" class="item"><i class="home icon"></i>Home</a>
            <a href="{{ route('users') }}" class="item"><i class="user icon"></i> Users</a>
            <a href="{{ route('teacher') }}" class="item"><i class="user secret icon"></i> Teachers</a>
            <a href="{{ route('students') }}" class="item"><i class="graduation cap icon"></i> Students</a>
            <a href="{{ route('subjects') }}" class="item"><i class="book icon"></i> Subjects</a>
        @else
            <a href="{{ route('home') }}" class="  item"><i class="home icon"></i>Home</a>
            <a href="{{ route('score') }}" class="item"><i class="calculator icon"></i> Score</a>
        @endif

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
