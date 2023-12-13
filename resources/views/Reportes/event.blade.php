@extends('layouts.app1')


<head>
    <title>Reportes</title>
    <link rel="stylesheet" href="{{asset('style/formularioReporte.css')}}">

</head>

@section('content')
<div class="contenedor">
  <form action="{{ route('report.event1') }}" method="post">
    @csrf 
    <label for="">Reportes de Eventos</label>
    <select name="evento" id="evento">
        @foreach($eventos as $event)
        <option value="{{$event->name}}">{{$event->name}}</option>
        @endforeach
    </select>

    <input type="submit" value="Ver Reporte">
</form>
 

</div>

@endsection