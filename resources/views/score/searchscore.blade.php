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
