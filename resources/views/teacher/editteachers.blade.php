@extends('layouts.plantilla')
@section('title', 'Edit Teacher')
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
                                <a class="ui violet ribbon label"><i class="plus square inverted pink icon"></i>Teachers</a>
                                <span></i>Teachers form</span>
                                <p></p>
                            </div>

                            <form class="ui form segment" action="{{ route('teacher.update', $teachers) }}" method="POST">

                                {{-- we had tu use method('put') because HTML can't not understant it --}}
                                @method('put')

                                @csrf
                                <div class="two fields">
                                    <div class="field">
                                        <label>ID teacher</label>
                                        <input placeholder="id teacher" name="cc_teacher"
                                            value="{{ $teachers->cc_teacher }}" type="number">
                                    </div>
                                    <div class="field">
                                        <label>Name</label>
                                        <input placeholder="teacher name" name="nombre" value="{{ $teachers->nombre }}"
                                            type="text">
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Subject</label>

                                    <select name='subject' class="ui dropdown">

                                        @php
                                            $teacher_subjectId = $subjectTeacher->id;
                                            $techer_subjectName = $subjectTeacher->nombre;
                                        @endphp

                                        <option value="{{ $teacher_subjectId }}">{{ $techer_subjectName }}</option>

                                        @foreach ($subjects as $subjects)
                                            @if ($teacher_subjectId != $subjects->id)
                                                <option value="{{ $subjects->id }}">{{ $subjects->nombre }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                                <br>
                                <div class="field align-center">
                                    <input class="ui  violet inverted button" type="submit" value="Update teacher">
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
