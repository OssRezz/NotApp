@extends('layouts.plantilla')
@section('title', 'Subjects')
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
                                <a class="ui violet ribbon label"><i class="plus square inverted pink icon"></i>Subjects</a>
                                <span></i>Subjects form</span>
                                <p></p>
                            </div>

                            <form class="ui form segment" action="{{ route('subjects.update', $subjects) }}"
                                method="POST">

                                {{-- we had tu use method('put') because HTML can't not understant it --}}
                                @method('put')
                                @csrf

                                <div class="one field">
                                    <div class="field">
                                        <label>Subject name</label>
                                        <input placeholder="subject name" name="nombre" value="{{ $subjects->nombre }}"
                                            type="text">
                                    </div>
                                </div>

                                <br>
                                <div class="field align-center">
                                    <input class="ui  violet inverted button" type="submit" value="Update subject">
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
    </div>


@endsection
