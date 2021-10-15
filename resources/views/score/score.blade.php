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
                                        <th>Student</th>
                                        <th>Subject</th>
                                        <th>Score</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($score as $score)
                                        <tr>
                                            <td>{{ $score->student }}</td>
                                            <td>{{ $score->subject }}</td>
                                            <td>{{ $score->score }}</td>
                                            <td class="center aligned">
                                                <div class="inline aligned">
                                                    <a href="{{ route('score.edit', $score) }}"><i
                                                            class="purple edit outline link icon"></i></a>
                                                    <a href="{{ route('score.edit', $score) }}"><i
                                                            class="pink trash link icon"></i></a>
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

    @endsection
