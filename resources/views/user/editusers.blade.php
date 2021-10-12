@extends('layouts.plantilla')
@section('tittle', 'Users edit')

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
                                <a class="ui violet ribbon label"><i class="plus square inverted pink icon"></i>Usuarios</a>
                                <span></i>Editar usuarios</span>
                                <p></p>
                            </div>

                            <form class="ui form segment" action="{{ route('users.update', $user) }}" method="post">
                                @csrf

                                {{-- we had tu use method('put') because HTML can't not understant it --}}
                                @method('put')

                                <div class="two fields">
                                    <div class="field">
                                        <label>Name</label>
                                        <input placeholder="First Name" name="nombre" value="{{ $user->nombre }}"
                                            type="text">
                                    </div>
                                    <div class="field">
                                        <label>E-mail</label>
                                        <input placeholder="E-mail" name="email" value="{{ $user->email }}" type="email">
                                    </div>
                                </div>
                                <div class="two fields">
                                    <div class="field">
                                        <label>Profile</label>
                                        <select name='perfil' class="ui dropdown">

                                            @php
                                                $user_profileId = $userProfile->id;
                                                $user_profileName = $userProfile->perfil;
                                            @endphp

                                            <option value="{{ $user_profileId }}">{{ $user_profileName }}</option>

                                            @foreach ($profiles as $profiles)

                                                @if ($user_profileId != $profiles->id)
                                                    <option value="{{ $profiles->id }}">{{ $profiles->perfil }}</option>
                                                @endif

                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="field">
                                        <label>State</label>
                                        <select name='estado' class="ui dropdown">

                                            @php
                                                
                                            @endphp
                                            @if ($user->estado === 1)
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            @else
                                                <option value="2">Inactive</option>
                                                <option value="1">Active</option>
                                            @endif


                                        </select>
                                    </div>


                                </div>


                                <br>
                                <div class="field align-center">
                                    <input class="ui  violet inverted button" type="submit" value="Update user">
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
                    </div>
                </div>
            </div>

        </div>

    @endsection
