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

                            <form class="ui form segment" action="subjects/create" method="POST">
                                @csrf

                                <div class="one field">
                                    <div class="field">
                                        <label>Subject name</label>
                                        <input placeholder="subject name" name="nombre" type="text">
                                    </div>
                                </div>

                                <br>
                                <div class="field align-center">
                                    <input class="ui  violet inverted button" type="submit" value="Add subject">
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

                                <form action="subjects/search" method="GET">

                                    <div class="ui action input">
                                        <input type="text" name="search" placeholder="Search for subjects...">
                                        <button type="submit" class="ui inverted purple button">Search</button>
                                    </div>

                                </form>

                            </div>

                            <table class="ui selectable  celled fixed  table">

                                <thead>
                                    <tr>
                                        <th>ID subject</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                        <tr>
                                            <td>{{ $subject->id }}</td>
                                            <td>{{ $subject->nombre }}</td>
                                            <td class="center aligned">
                                                <div class="inline aligned">
                                                    <a href="{{ route('subjects.edit', $subject) }}"><i
                                                            class="purple edit outline link icon"></i></a>
                                                    <a href="{{ route('subjects.edit', $subject) }}"><i
                                                            class="pink trash link icon"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="ui right aligned container">
                                <span>{{ $subjects->links('vendor/pagination/semantic-ui', ['paginator' => $subjects]) }}</span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
