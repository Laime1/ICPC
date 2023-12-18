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
      
            @if(Auth::user()->rol == 'Administrador')
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
                <input type="checkbox" id="competencia-toggle" class="toggle">
                <label for="competencia-toggle">Backups y Bitacoras</label>
                <ul class="dropdown-content">
                    <li><a href="{{ route('listar.backups') }}" >Backups</a></li>
                    <li><a href="{{ route('mostrar.logs') }}">Bitacoras</a></li>
                </ul>
            </li>
            @endif

            <li class="dropdown">
                <input type="checkbox" id="participantes-toggle" class="toggle">
                <label for="participantes-toggle">Registrar participantes</label>
                <ul class="dropdown-content">
                    <li><a href="{{ route('participantes.create') }}">Añadir Participantes(Grupal)</a></li>
                    <li><a href="{{ route('participante.create') }}">Añadir Participantes(Individual)</a></li>

                    @if(Auth::user()->rol == 'Coach' || Auth::user()->rol == 'Administrador')
                    <li><a href="{{ route('participantes.index') }}">Mostrar lista de Participantes</a></li>
                    @endif

                </ul>
            </li>

            @if(Auth::user()->rol == 'Coach' || Auth::user()->rol == 'Administrador')
            <ul>
            <li><a href="{{ route('report.event') }}">Reportes</a></li>
            </ul>
            @endif

        </ul>
        
    </div>
    
    <div class="content">
        @yield('content')
        <footer>
            <!-- Contenido del pie de página -->
            <p style="text-align: center">&copy; 2023 ICPC Sinteg. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>