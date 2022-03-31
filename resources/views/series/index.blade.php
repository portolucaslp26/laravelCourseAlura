@extends('templates.template')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1>Séries</h1>
    </div>
    @if (!empty($message))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif
    <a href="{{route('create_serie')}}" class="btn btn-dark mb-2">Adicionar</a>
    <ul class="listgroup pl-0">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$serie->name}}
            <form action="/series/delete/{{$serie->id}}" method="POST"
                onsubmit="return confirm('Tem certeza que deseja remover {{$serie->name}}?')">
                @csrf
                @method('DELETE')
                <button class="btn mt-2 btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </li>
        <hr>
        @endforeach
    </ul>
</div>
