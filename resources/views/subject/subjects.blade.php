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
                                        <th>ID subject</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subjects)
                                        <tr>
                                            <td>{{ $subjects->id }}</td>
                                            <td>{{ $subjects->nombre }}</td>
                                            <td class="center aligned">
                                                <div class="inline aligned">
                                                    <a href="{{ route('subjects.edit', $subjects) }}"><i
                                                            class="purple edit outline link icon"></i></a>
                                                    <a href="{{ route('subjects.edit', $subjects) }}"><i
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
