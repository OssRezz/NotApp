@extends('layouts.plantilla')
@section('title', 'Edit score')
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
                                <a class="ui violet ribbon label"><i class="plus square inverted pink icon"></i>Edit
                                    score</a>
                                <span></i>Edit scores form</span>
                                <p></p>
                            </div>

                            <form class="ui form segment" action="{{ route('score.update', $score) }}" method="POST">
                                {{-- we had tu use method('put') because HTML can't not understant it --}}
                                @method('put')
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
                                        <input placeholder="student score" name="score" value="{{ $score->score }}"
                                            type="number" step="0.01">
                                    </div>
                                </div>


                                <br>
                                <div class="field align-center">
                                    <input class="ui  violet inverted button" type="submit" value="Update score">
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
