@extends('layouts.main')

@section('title', 'Parceiros')

@section('content')

<h1>Parceiros</h1>

<div id="event-create-container" class="col-md-6 offset-md-3">
<h3>Cadastrar parceiro</h3>
<form action="/parceiros" method="POST"> 
    @csrf 
    <div class="form-group">
        <label for="title">Parceiro:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do parceiro">
    </div>    
    <input type="submit" class="btn btn-primary" value="Criar parceiro"><br><br>

    @php
echo "<h4>Lista de parceiros</h4>"
@endphp <br>

@foreach($parceiros as $convidado)        
    <p>{{ $convidado->nome }} -- {{ $convidado->idade }} </p>
@endforeach 




@endsection