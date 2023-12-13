<x-app-layout>

<head>
  <link rel="stylesheet" href="{{asset('style/vistaEvento.css')}}">

</head>
<div class="Contenedor">

    <div class="titulo">
        <h1>{{$evento->name}}</h1>
    </div>

    <div class="imagen">
        <img src="{{ route('image.show', $evento->id) }}" alt="Imagen">
    </div>

    <div class="fecha">
        <h1>{{ \Carbon\Carbon::parse($evento->date)->locale('es_ES')->isoFormat('dddd, D [de] MMMM') }}</h1>
    </div>

    <div class="hora">
        <h1>A horas</h1>
        <h1>{{ date('H:i', strtotime($evento->time)) }}</h1>
    </div>

    <div class="descripcion">
        <label>{{$evento->description}}</label>
    </div>

    <div class="lugar">
        <h1>{{$evento->location}}</h1>
    </div>
    <div class="penultimo">
          <h1> Lugar:</h1>
    </div>

    <button onclick="imprimirReporte()">Imprimir Reporte</button>

    <script>
        function imprimirReporte() {
          window.print();
        }
    </script>

</div>
</x-app-layout>
