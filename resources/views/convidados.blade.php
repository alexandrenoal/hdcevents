@extends('layouts.main')

@section('title', 'Convidados')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
<h2>Cadastrar convidado</h2>

    <form action="/convidados" method="POST"> 
        @csrf 
        <div class="form-group">
            <label for="title">Convidado:</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do convidado">
        </div>
        <div class="form-group">
            <label for="title">Idade:</label>
            <input type="text" class="form-control" id="idade" name="idade" placeholder="Idade do convidado">
        </div>   <br>
        <input type="submit" class="btn btn-primary" value="Cadastrar convidado"><br><br>
    </form>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-title-container">
    <h4>Lista de convidados</h4>
    </div>
    <div class="col-md-10 offset-md-1 convidados-container">

        <table class="table">
            <thead>
                <tr>            
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Idade</th> 
                    <th scope="col">ID</th> 
                    <th scope="col">Ações</th>              
                </tr>
            </thead>
            <tbody>
            @foreach($convidados as $convidado) 
                <tr>
                    <td scope="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/convidados/{{ $convidado->id }}"> {{ $convidado->nome }}</a></td>
                    <td>{{ $convidado->idade }}</td>
                    <td>{{ $convidado->id }}</td>                
                    <td>
                        <a href="/editconvidados/{{ $convidado->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>                   
                        <form action="/convidados/{{ $convidado->id }}" method="POST">
                        @csrf
                        @method('Delete')        
                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form> 
                    </td>
                </tr>
                @endforeach 
            </tbody>    
        </table> 
</div>



@endsection