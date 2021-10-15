@extends('layouts.plantilla')
@section('title','Home')
@section('content')


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
                                <a href="#" class="ui violet  button" onclick="this.closest('form').submit()"><i
                                        class="sign-out alternate icon"></i>Log-out
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

    @endsection
