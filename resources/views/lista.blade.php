@extends('layouts.main')

@section('title', 'Lista')

@section('content')

<h1>Área de Lista</h1>

@foreach($lista as $convidado)        
    <p>{{ $convidado->nome }} -- {{ $convidado->idade }} </p>
@endforeach


@endsection