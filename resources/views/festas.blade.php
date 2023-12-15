@extends('layouts.main')

@section('title', 'Festas')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
<h3>Cadastrar Festa</h3>
<form action="/festas" method="POST"> 
    @csrf 
    <div class="form-group">
        <label for="title">Festa:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da festa">
    </div>    
    <input type="submit" class="btn btn-primary" value="Criar festa"><br><br>


    @foreach($festas as $a)        
    <p>{{ $a->nome }}</p>
    @endforeach 
    </div>

   
    </form>
    
@endsection