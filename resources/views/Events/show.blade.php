@extends('layouts.main')

@section('title', $event->title)

@section('content')
    
    <div class="col-md-10 offset-md-1">
       <!-- <div class="row"> A class row ta quebrando o botão-->
            <div>
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title}}">
            </div>
            <div id="info-container" class="col-md-6"></div>                
             <h1>{{ $event->title }}</h1>
             <p class="card-date"><ion-icon name="calendar-outline"></ion-icon> {{ date('d/m/y', strtotime($event->date)   ) }}</p>
             <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>             
             <p class="events-participants"><ion-icon name="people-outline"></ion-icon> X participantes</p>
             <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner['name'] }}</p>
             <a href="#" class="btn btn-primary" id="event-submit">Confirmar presença</a>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>sobre o evento:</h3>
            <p class="event-description">{{ $event->description}}</p>
        </div> 
    </div>

<!-- aula 18 nao deu certo -->

@endsection