@extends('layouts.main')

@section('title', '')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{$search}}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os event os dos próximos dias</p>

    @endif
    <div id="cards-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
            <img src="/img/events/{{ $event->image}}" alt="{{ $event->title }}">
            <div class="card-body" >
                <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-participants">500 Participantes</p>
                <a href="/events/{{$event->id}}" class="btn btn-primary btn-block ">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($events) == 0 && $search)
        <p>Não foi possivel encontrar nenhum evento com {{$search}}! <a href="/">Ver todos os Eventos</a></p>
        @elseif(count($events) == 0 && $search)

        <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>

@endsection