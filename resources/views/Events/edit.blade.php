@extends('layouts.main')

@section('title', 'Editando: ' . $event->title) 

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h2>Editando: {{ $event->title }}</h2>
        <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data"> 
            @csrf 
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" value="{{ $event->title }}">
            </div>
            <div class="form-group">
                <label for="title">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $event->date }}">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento" value="{{ $event->city }}">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado?:</label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{  $event->description }}</textarea>
            </div><br>
            <input type="submit" class="btn btn-primary" value="Atualizar evento">
        </form>
</div>



@endsection