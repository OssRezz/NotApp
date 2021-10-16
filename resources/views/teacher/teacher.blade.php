@extends('layouts.plantilla')
@section('title', 'Teachers')
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
                                <a class="ui violet ribbon label"><i class="plus square inverted pink icon"></i>Teachers</a>
                                <span></i>Teachers form</span>
                                <p></p>
                            </div>

                            <form class="ui form segment" action="teacher/create" method="POST">
                                @csrf
                                <div class="two fields">
                                    <div class="field">
                                        <label>ID teacher</label>
                                        <input placeholder="id teacher" name="cc_teacher" type="number">
                                    </div>
                                    <div class="field">
                                        <label>Name</label>
                                        <input placeholder="teacher name" name="nombre" type="text">
                                    </div>
                                </div>

                                <div class="field">
                                    <label>Subject</label>

                                    <select name='subject' class="ui dropdown">
                                        @foreach ($subjects as $subjects)
                                            <option value="{{ $subjects->id }}">{{ $subjects->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <br>
                                <div class="field align-center">
                                    <input class="ui  violet inverted button" type="submit" value="Add teacher">
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

                                <form action="teacher/search" method="GET">

                                    <div class="ui action input">
                                        <input type="text" name="search" placeholder="Teachers or subjects...">
                                        <button type="submit" class="ui inverted purple button">Search</button>
                                    </div>

                                </form>

                            </div>

                            <table class="ui selectable  celled fixed  table">

                                <thead>
                                    <tr>
                                        <th>ID teacher</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->cc_teacher }}</td>
                                            <td>{{ $teacher->teacher }}</td>
                                            <td>{{ $teacher->nombre }}</td>
                                            <td class="center aligned">
                                                <div class="inline aligned">
                                                    <a href="{{ route('teacher.edit', $teacher) }}"><i
                                                            class="purple edit outline link icon"></i></a>
                                                    <a href="{{ route('teacher.edit', $teacher) }}"><i
                                                            class="pink trash link icon"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="ui right aligned container">
                                <span>{{ $teachers->links('vendor/pagination/semantic-ui', ['paginator' => $teachers]) }}</span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
