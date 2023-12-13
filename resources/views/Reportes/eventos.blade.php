@extends('layouts.app1')

<head>
    <title>Reportes</title>
    <link rel="stylesheet" href="{{asset('style/reporte1.css')}}">

</head>

@section('content')

<div class="participante">
    <h2>{{ $evento->name }}</h2>
    <p>Ubicación: {{ $evento->location }}</p>
    <p>Fecha y hora: {{ \Carbon\Carbon::parse($evento->date)->locale('es_ES')->isoFormat('dddd, D [de] MMMM') }} a horas {{ date('h:i A', strtotime($evento->time)) }}</p>
    <p>Número de participantes: {{ count($participantes) }}</p>

    <h3>Participantes en el evento {{ $evento->name }}</h3>

    <ul>
        @foreach ($participantes as $participante)
            <li>{{ $participante->nombre }} {{ $participante->apellido }}</li>
        @endforeach
    </ul>
</div>

@endsection