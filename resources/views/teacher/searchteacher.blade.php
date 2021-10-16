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

@endsection
