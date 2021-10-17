@extends('layouts.plantilla')
@section('title', 'Home')
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
                <div class="two  column">
                    <div class="container ">

                        <div class="ui link cards">

                            <div class="card">
                                <div class="content">
                                    <div class="header"><i class="flag icon"></i> Users report</div>
                                    <div class="description">
                                        Download all the users from data base
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <a href="{{ route('users.export') }}" class="ui gray header small">Download <i
                                            class="download icon"></i></a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="content">
                                    <div class="header"><i class="flag icon"></i> Teachers report</div>
                                    <div class="description">
                                        Download all the teachers from data base
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <a href="{{ route('teacher.export') }}" class="ui gray header small">Download <i
                                            class="download icon"></i></a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="content">
                                    <div class="header"><i class="flag icon"></i> Students report</div>
                                    <div class="description">
                                        Download all the students from data base
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <a href="{{ route('student.export') }}" class="ui gray header small">Download <i
                                            class="download icon"></i></a>
                                </div>
                            </div>


                            <div class="card">
                                <div class="content">
                                    <div class="header"><i class="flag icon"></i> Subjects report</div>
                                    <div class="description">
                                        Download all the subjects from data base
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <a href="{{ route('subjects.export') }}" class="ui gray header small">Download <i
                                            class="download icon"></i></a>
                                </div>
                            </div>

                            <div class="card ">
                                <div class="content">
                                    <div class="header"><i class="flag icon"></i> Score report</div>
                                    <div class="description">
                                        Download the score of the students from data base
                                    </div>
                                </div>
                                <div class="ui bottom attached button">
                                    <a href="{{ route('score.export') }}" class="ui gray header small">Download <i
                                            class="download icon"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>

            </div>
        </div>
    </div>

@endsection
