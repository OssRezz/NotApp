@extends('layouts.plantilla')
@section('title', 'Users')
@section('content')

    <div class="pusher">
        <div class="ui  grid">

            <div class="row">
                <div class="column">
                    <div class="container">
                        <div class="ui menu purple inverted menuTop">
                            <a href="#" class="item" id="btnHb"><i class="bars icon"></i></a>
                            <div class="item" id="">{{ Auth::user()->nombre }}</div>
                            <div class="item right">
                                <form action="users/logout" method="POST">
                                    @csrf
                                    <a href="#" class="ui violet  button" onclick="this.closest('form').submit()"><i
                                            class="sign-out alternate icon"></i>Log-out
                                    </a>
                                </form>
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
                                <a class="ui violet ribbon label"><i class="plus square inverted pink icon"></i>Usuarios</a>
                                <span></i>Users form</span>
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
                                        <label>State</label>
                                        <select name='estado' class="ui dropdown">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Profile</label>

                                    <select name='perfil' class="ui dropdown">
                                        @foreach ($profiles as $profile)
                                            <option value="{{ $profile->id }}">{{ $profile->perfil }}</option>
                                        @endforeach
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


                            <div class="ui right aligned container">

                                <form action="users/search" method="GET">

                                    <div class="ui action input">
                                        <input type="text" name="search" placeholder="Name or email...">
                                        <button type="submit" class="ui inverted purple button">Search</button>
                                    </div>

                                </form>

                            </div>

                            <table class="ui selectable  celled fixed  table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Status</th>
                                        <th>Profile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $users)
                                        <tr>
                                            <td>{{ $users->nombre }}</td>
                                            <td>{{ $users->email }}</td>
                                            @php
                                                $estado = $users->estado === 1 ? 'Active' : 'Inactive';
                                                $perfil = $users->id_perfil === 1 ? 'Admin' : 'Docente';
                                            @endphp
                                            <td>{{ $estado }}</td>
                                            <td>{{ $perfil }}</td>
                                            <td class="center aligned">
                                                <div class="inline aligned">
                                                    <a href="{{ route('users.edit', $users) }}"><i
                                                            class="purple edit outline link icon"></i></a>
                                                    <a href="{{ route('users.edit', $users) }}"><i
                                                            class="pink trash link icon"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="ui right aligned container">
                                <span>{{ $user->links('vendor/pagination/semantic-ui', ['paginator' => $user]) }}</span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
