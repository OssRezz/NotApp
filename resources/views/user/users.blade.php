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
        <a class="header item">NotAppp </a>
        @if (Auth::user()->id_perfil === 1)
            <a href="{{ route('home') }}" class="  item"><i class="home icon"></i>Home</a>
            <a href="#" class="active item"><i class="user icon"></i> Users</a>
            <a href="#" class="item"><i class="user secret icon"></i> Teachers</a>
            <a href="#" class="item"><i class="graduation cap icon"></i> Students</a>
            <a href="#" class="item"><i class="book icon"></i> Subjects</a>
        @else
            <a href="{{ route('home') }}" class="  item"><i class="home icon"></i>Home</a>
            <a href="#" class="item"><i class="calculator icon"></i> Notas</a>
        @endif

    </div>

    <div class="pusher">
        <div class="ui  grid">

            <div class="row">
                <div class="column">
                    <div class="container">
                        <div class="ui menu purple inverted menuTop">
                            <a href="#" class="item" id="btnHb"><i class="bars icon"></i></a>
                            <div class="item" id="">{{ Auth::user()->nombre }}</div>
                            <div class="item right">
                                <div class="ui violet  button"><i class="sign-out alternate icon"></i> Log-out</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="two column stackable row centered">
                <div class="one column">
                    <div class="container">

                        <div class="ui segment">
                            <div class="ui raised segment">
                                <a class="ui violet ribbon label"><i
                                        class="plus square inverted pink icon"></i>Usuarios</a>
                                <span></i>Formulario de usuarios</span>
                                <p></p>
                            </div>

                            <form class="ui form segment" action="users/create" method="POST">
                                @csrf
                                <div class="two fields">
                                    <div class="field">
                                        <label>Name</label>
                                        <input placeholder="First Name" name="nombre" type="text">
                                    </div>
                                    <div class="field">
                                        <label>E-mail</label>
                                        <input placeholder="E-mail" name="email" type="email">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Password</label>
                                        <input type="password" name="password">
                                    </div>
                                    <div class="field">
                                        <label>Estado</label>
                                        <select name='estado' class="ui dropdown">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Perfil</label>

                                    <select name='perfil' class="ui dropdown">
                                        <option value="1">Admin</option>
                                        <option value="2">Docente</option>
                                    </select>

                                </div>

                                <br>
                                <div class="field align-center">
                                    <input class="ui  violet inverted button" type="submit" value="Add user">
                                </div>


                            </form>
                            @if ($errors->any())
                                <x-alert :mensaje="$errors" />
                            @endif

                            @if (session()->has('message'))
                                <div class="ui violet message">
                                    <i class="close icon"></i>
                                    <div class="header">
                                        {{ session()->get('message') }}
                                    </div>
                                </div>
                            @endif

                        </div>

                        <div class="ui segment">


                            <div class="ui one item menu">
                                <div class="ui left category search item">

                                    <div class="ui transparent icon input" style="padding-left: 0.2rem;">
                                        <input class="prompt" type="text" placeholder="Search for users...">
                                        <div class="ui animated violet inverted  button" tabindex="0">
                                            <div class="visible content">
                                                <a href=""><i class="search link icon violet"></i></a>
                                            </div>
                                            <div class="hidden content">
                                                <a href=""><i class="right arrow icon inverted"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <table class="ui selectable  celled fixed  table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                        <th>Perfil</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $user)
                                        <tr>
                                            <td>{{ $user->nombre }}</td>
                                            <td>{{ $user->email }}</td>
                                            @php
                                                $estado = $user->estado === 1 ? 'Active' : 'Inactive';
                                                $perfil = $user->id_perfil === 1 ? 'Admin' : 'Docente';
                                            @endphp
                                            <td>{{ $estado }}</td>
                                            <td>{{ $perfil }}</td>
                                            <td class="center aligned">
                                                <div class="ui semall buttons">
                                                    <a href="" class="left  floated ui icon button pink ">Edit</a>
                                                    <div class="or" style="font"></div>
                                                    <a href="" class="right floated ui icon button  violet  ">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

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
