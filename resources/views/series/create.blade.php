@extends('templates.template')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h1>Adicionar Série</h1>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="col col-2">
                <label for="num_temp">Nº temporadas</label>
                <input type="number" min="1" class="form-control" name="number_session" id="num_temp">
            </div>
            <div class="col col-2">
                <label for="num_ep">Ep. por temporada</label>
                <input type="number" min="1" class="form-control" name="number_episode" id="num_ep">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
</div>
