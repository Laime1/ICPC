<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('style/blade.css')}}">
</head>
<body>
    
    <div id="sidebar">
        <ul class="menu">
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            <li><b>Eventos</b></li>
      
            <li class="dropdown">
                <input type="checkbox" id="eventos-toggle" class="toggle">
                <label for="eventos-toggle">Reclutamiento</label>
                <ul class="dropdown-content">
                    <li><a href="{{ route('events.create',['parametro' => 'reclutamiento']) }}" >Crear Evento</a></li>
                    <li><a href="{{ route('listaDeEventos',['parametro' => 'reclutamiento']) }}">Gestionar Evento</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <input type="checkbox" id="entrenamiento-toggle" class="toggle">
                <label for="entrenamiento-toggle">Taller de Entrenamiento</label>
                <ul class="dropdown-content">
                    <li><a href="{{ route('events.create',['parametro' => 'entrenamiento']) }}" >Crear Evento</a></li>
                    <li><a href="{{ route('listaDeEventos',['parametro' => 'entrenamiento']) }}">Gestionar Evento</a></li>
                    <li><a href="{{ route('participante.create',['parametro' => 'entrenamiento']) }}">Añadir Participantes</a></li>

                </ul>
            </li>
            <li class="dropdown">
                <input type="checkbox" id="competencia-toggle" class="toggle">
                <label for="competencia-toggle">Competencia</label>
                <ul class="dropdown-content">
                    <li><a href="{{ route('events.create',['parametro' => 'competencia']) }}" >Crear Evento</a></li>
                    <li><a href="{{ route('listaDeEventos',['parametro' => 'competencia']) }}">Gestionar Evento</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <input type="checkbox" id="participantes-toggle" class="toggle">
                <label for="participantes-toggle">Participantes</label>
                <ul class="dropdown-content">
                    <li><a href="{{ route('participantes.create') }}">Añadir Participantes(Grupal)</a></li>
                    <li><a href="{{ route('participante.create') }}">Añadir Participantes(Individual)</a></li>
                    <li><a href="{{ route('participantes.index') }}">Mostrar lista de Participantes</a></li>

                </ul>
            </li>
            <li><a href="{{ route('report.event') }}">Reportes</a></li>

        </ul>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>