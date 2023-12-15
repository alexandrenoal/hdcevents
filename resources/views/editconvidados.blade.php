@extends('layouts.main')

@section('title', 'Editando: ' . $convidados->nome)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
<h2>Editando: {{ $convidados->nome }}</h2>
    </div>
        <div id="event-create-container" class="col-md-6 offset-md-3">
            <form action="/convidados/update/{{ $convidados->id }}" method="POST"> 
                @csrf 
                @method('PUT')
                <div class="form-group">
                    <label for="title">Convidado:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do convidado" value="{{ $convidados->nome }}">
                </div>
                <div class="form-group">
                    <label for="title">Idade:</label>
                    <input type="text" class="form-control" id="idade" name="idade" placeholder="Idade do convidado" value="{{ $convidados->idade }}">
                </div>   <br>
                <input type="submit" class="btn btn-primary" value="Atualizar convidado"><br><br>
            </form>
        </div>
    </div>
</div>
@endsection