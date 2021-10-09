<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="img/pen.svg">
    <title>Inicio sesión</title>

</head>

<body>
    <div class="ui vertical violet inverted labeled icon left thin sidebar pointing menu">
        <a class="header item">NotApp </a>
        @if (Auth::user()->id_perfil === 1)
            <a href="{{ route('home') }}" class="active  item"><i class="home icon"></i>Home</a>
            <a href="{{ route('users') }}" class="item"><i class="user icon"></i> Users</a>
            <a href="#" class="item"><i class="user secret icon"></i> Teachers</a>
            <a href="#" class="item"><i class="graduation cap icon"></i> Students</a>
            <a href="#" class="item"><i class="book icon"></i> Subjects</a>
        @else
            <a href="{{ route('home') }}" class="active  item"><i class="home icon"></i>Home</a>
            <a href="#" class="item"><i class="calculator icon"></i> Notas</a>
        @endif
    </div>

    <div class="pusher">
        <div class="ui  grid">

            <div class="row">
                <div class="column">

                    <div class="ui menu purple inverted menuTop">
                        <a href="#" class="item" id="btnHb"><i class="bars icon"></i></a>
                        <div class="item" id="">{{ Auth::user()->nombre }}</div>

                        <div class="item right">
                            <form action="users/logout" method="POST">
                              @csrf
                                <a href="#" class="ui violet  button" onclick="this.closest('form').submit()"><i class="sign-out alternate icon"></i>Log-out
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="two column stackable row centered">
                <div class="one column">
                    <div class="container">

                        <div class="ui cards">
                            <div class="card">
                                <div class="content">
                                    <div class="header">Elliot Fu</div>
                                    <div class="description">
                                        Elliot Fu is a film-maker from New York.
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <i class="add icon"></i>
                                    Add Friend
                                </div>
                            </div>
                            <div class="card">
                                <div class="content">
                                    <div class="header">Veronika Ossi</div>
                                    <div class="description">
                                        Veronika Ossi is a set designer living in New York who enjoys kittens, music,
                                        and partying.
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <i class="add icon"></i>
                                    Add Friend
                                </div>
                            </div>
                            <div class="card">
                                <div class="content">
                                    <div class="header">Jenny Hess</div>
                                    <div class="description">
                                        Jenny is a student studying Media Management at the New School
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <i class="add icon"></i>
                                    Add Friend
                                </div>
                            </div>
                        </div>

                        <div class="ui cards">
                            <div class="card">
                                <div class="content">
                                    <div class="header">Elliot Fu</div>
                                    <div class="description">
                                        Elliot Fu is a film-maker from New York.
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <i class="add icon"></i>
                                    Add Friend
                                </div>
                            </div>
                            <div class="card">
                                <div class="content">
                                    <div class="header">Veronika Ossi</div>
                                    <div class="description">
                                        Veronika Ossi is a set designer living in New York who enjoys kittens, music,
                                        and partying.
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <i class="add icon"></i>
                                    Add Friend
                                </div>
                            </div>
                            <div class="card">
                                <div class="content">
                                    <div class="header">Jenny Hess</div>
                                    <div class="description">
                                        Jenny is a student studying Media Management at the New School
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <i class="add icon"></i>
                                    Add Friend
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
