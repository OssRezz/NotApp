@extends('layouts.plantilla')
@section('title', 'Score')
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
                                <a class="ui violet ribbon label"><i class="plus square inverted pink icon"></i>Scores</a>
                                <span></i>Scores form</span>
                                <p></p>
                            </div>

                            <form class="ui form segment" action="score/create" method="POST">
                                @csrf

                                <div class="field">
                                    <label>Student</label>

                                    <select name='student' class="ui dropdown">
                                        @foreach ($students as $students)
                                            <option value="{{ $students->cc_student }}">{{ $students->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="field">
                                    <label>Subject</label>

                                    <select name='subject' class="ui dropdown">
                                        @foreach ($subjects as $subjects)
                                            <option value="{{ $subjects->id }}">{{ $subjects->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="one field">
                                    <div class="field">
                                        <label>Score</label>
                                        <input placeholder="student score" name="score" type="number" step="0.01">
                                    </div>
                                </div>


                                <br>
                                <div class="field align-center">
                                    <input class="ui  violet inverted button" type="submit" value="Add score">
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

                                <form action="score/search" method="GET">

                                    <div class="ui action input">
                                        <input type="text" name="search" placeholder="Search for subjects...">
                                        <button type="submit" class="ui inverted purple button">Search</button>
                                    </div>

                                </form>

                            </div>

                            <table class="ui selectable  celled fixed  table">

                                <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Subject</th>
                                        <th>Score</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($score as $scores)
                                        <tr>
                                            <td>{{ $scores->student }}</td>
                                            <td>{{ $scores->subject }}</td>
                                            <td>{{ $scores->score }}</td>
                                            <td class="center aligned">
                                                <div class="inline aligned">
                                                    <a href="{{ route('score.edit', $scores) }}"><i
                                                            class="purple edit outline link icon"></i></a>
                                                    <a href="{{ route('score.edit', $scores) }}"><i
                                                            class="pink trash link icon"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="ui right aligned container">
                                <span>{{ $score->links('vendor/pagination/semantic-ui', ['paginator' => $score]) }}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
