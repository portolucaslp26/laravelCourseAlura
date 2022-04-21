@extends('templates.template')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1>Temporadas de {{$serie->name}}</h1>
    </div>

    <ul class="list-group">
        @foreach($sessions as $session)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/sessions/{{$session->id}}/episodes">
                Temporada {{$session->number_session}}
            </a>
            <span class="badge badge-secondary">
                {{$session->getVisualizedEpisodes()->count()}} / {{$session->episodes->count()}}
            </span>
        </li>
        @endforeach
    </ul>
</div>
