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
        <div class="form-group">
            <input type="text" class="form-control" placeholder="NOME" name="name" required>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
</div>
