@extends('layouts.main')

@section('title', 'Equipes')

@section('content')

<h1>Equipes</h1>

<div id="event-create-container" class="col-md-6 offset-md-3">
<h3>Cadastrar equipe</h3>
<form action="/equipes" method="POST"> 
    @csrf 
    <div class="form-group">
        <label for="title">Equipe:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da equipe">
    </div>    
    <input type="submit" class="btn btn-primary" value="Criar equipe"><br><br>


@foreach($equipes as $a)        
    <p>{{ $a->nome }} -- {{ $a->idade }} </p>
@endforeach 


@endsection