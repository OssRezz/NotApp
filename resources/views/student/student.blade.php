@extends('layouts.plantilla')
@section('title', 'Students')
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
                                <a class="ui violet ribbon label"><i class="plus square inverted pink icon"></i>Students</a>
                                <span></i>Students form</span>
                                <p></p>
                            </div>

                            <form class="ui form segment" action="students/create" method="POST">
                                @csrf

                                <div class="one field">
                                    <div class="field">
                                        <label>ID student</label>
                                        <input placeholder="id student" name="cc_student" type="number">
                                    </div>
                                </div>

                                <div class="one field">
                                    <div class="field">
                                        <label>Name</label>
                                        <input placeholder="student name" name="nombre" type="text">
                                    </div>
                                </div>

                                <div class="one field">
                                    <div class="field">
                                        <label>Email</label>
                                        <input placeholder="student email" name="email" type="email">
                                    </div>
                                </div>


                                <br>
                                <div class="field align-center">
                                    <input class="ui  violet inverted button" type="submit" value="Add student">
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

                                <form action="students/search" method="GET">

                                    <div class="ui action input">
                                        <input type="text" name="search" placeholder="Search for students...">
                                        <button type="submit" class="ui inverted purple button">Search</button>
                                    </div>

                                </form>

                            </div>

                            <table class="ui selectable  celled fixed  table">

                                <thead>
                                    <tr>
                                        <th>ID student</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->cc_student }}</td>
                                            <td>{{ $student->nombre }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td class="center aligned">
                                                <div class="inline aligned">
                                                    <a href="{{ route('student.edit', $student) }}"><i
                                                            class="purple edit outline link icon"></i></a>
                                                    <a href="{{ route('student.edit', $student) }}"><i
                                                            class="pink trash link icon"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="ui right aligned container">
                                <span>{{ $students->links('vendor/pagination/semantic-ui', ['paginator' => $students]) }}</span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
