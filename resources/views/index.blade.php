@extends('layouts.plantilla')
@section('tittle', 'Log In')
@section('content')

    <body>
        <div class="ui container">
            <div class="ui grid center stackable aligned contenedor">

                <div class="row">

                    <div class="eight wide column mobile hidden">
                        <lottie-player class="ui centered image no-background desktop only grid"
                            src="{{ asset('img/lottie.json') }}" background="transparent" speed="0.5" loop autoplay>
                        </lottie-player>
                    </div>

                    <div class="eight wide column grid middle aligned content colColor">

                        <div class="column contenidoForm center">

                            <form class="inverted ui form p-2" action="users/login" method="POST">
                                @csrf

                                <div class="field">
                                    <label for="email">Correo</label>
                                    <input type="email" name="email" autocomplete="nickname"
                                        placeholder="Ingresa el correo">
                                </div>
                                <div class="field pb-1">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" autocomplete="current-password"
                                        placeholder="Ingresa su password">
                                </div>
                                <div class="field center pb-1">
                                    <button class="ui  teal button" type="submit" value="login">Iniciar
                                        Sesión</button>
                                </div>

                                <div class="column">
                                    @if ($errors->any())
                                        <x-alert :mensaje="$errors" />
                                    @endif

                                    @if (session()->has('message'))
                                        <div class="ui purple message">
                                            <i class="close icon"></i>
                                            <div class="header">
                                                {{ session('message') }}
                                            </div>
                                        </div>
                                    @endif

                                </div>

                        </div>



                    </div>

                </div>

            </div>
        </div>

    @endsection
