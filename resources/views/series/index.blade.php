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
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="serie-name-{{$serie->id}}">{{$serie->name}}</span>

            <div class="input-group w-50" hidden id="input-serie-name-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->name }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editSerie({{ $serie->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <span class="d-flex">
                <button class="btn btn-info mt-2 mr-2 align-self-baseline" onclick="toggleInput({{$serie->id}})">
                    <i class="fas fa-edit"></i>
                </button>
                <a href="/series/{{$serie->id}}/sessions">
                    <button class="btn btn-info mr-2 mt-2 align-self-center">
                        <i class="fas fa-external-link-alt"></i>
                    </button>
                </a>
                <form action="/series/delete/{{$serie->id}}" method="POST"
                    onsubmit="return confirm('Tem certeza que deseja remover {{$serie->name}}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn mt-2 btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
</div>
<script>
    function toggleInput(serieId) {
        const serieInput = document.querySelector(`#input-serie-name-${serieId}`);
        const serieName = document.querySelector(`#serie-name-${serieId}`);

        if (serieName.hasAttribute('hidden')) {
            serieName.removeAttribute('hidden');
            serieInput.hidden = true;
        } else {
            serieInput.removeAttribute('hidden');
            serieName.hidden = true;
        }
    }

    function editSerie(serieId) {
        let formData = new FormData();
        const name = document.querySelector(`#input-serie-name-${serieId} > input`).value;
        const url = `/series/${serieId}/editSerie`;
        const token = document.querySelector('input[name="_token"]').value;
        formData.append('name', name);
        formData.append('_token', token);

        fetch(url, {
            body: formData,
            method: 'POST'
        }).then(() => {
            toggleInput(serieId);
            document.querySelector(`#serie-name-${serieId}`).textContent = name;

        })
    }
</script>
