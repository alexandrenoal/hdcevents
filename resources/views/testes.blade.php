@extends('layouts.main')

@section('title', 'Parceiros')

@section('content')

<h1>Parceiros</h1>

@php
echo "</p>"
@endphp

@foreach($testes as $convidado)        
    <p>{{ $convidado->nome }} -- {{ $convidado->sobrenome }} </p>
@endforeach





@endsection