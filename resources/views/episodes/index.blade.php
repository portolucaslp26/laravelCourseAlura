@extends('templates.template')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1>Episódios</h1>
    </div>
    @if (!empty($message))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    <form action="/sessions/{{ $sessionId }}/episodes/visualized" method="POST">
        @csrf
        <ul class="list-group">
            @foreach($episodes as $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{ $episode->number_episode }}
                <input type="checkbox" name="episodes[]" value="{{ $episode->id }}" {{ $episode->visualized ? 'checked' : '' }}>
            </li>
            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</div>
