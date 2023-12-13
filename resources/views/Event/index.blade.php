
<head>
    <title>Lista De Eventos</title>
    <link rel="stylesheet" href="{{asset('style/lista.css')}}">

</head>
    @extends('layouts.app1')

@section('content')
    <div class="container">
        <h1>Eventos de {{$parametro}}</h1>

        @if(session('success'))
            <div class="alert">
                <li>{{ session('success') }}</li>
            </div>
        @endif
        
        <table class="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Lugar</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Organizador</th>
                    <th>image</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                 @if($event->tipe===$parametro)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->date }}</td>
                        <td>{{ $event->time }}</td>
                        <td>{{ $event->location }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->tipe }}</td>
                        <td>{{ $event->organizer }}</td>
                
                        <td>
                            <img src="{{ route('image.show', $event->id) }}" alt="Imagen">
                        </td>
                        <td>
                            <button onclick="window.location.href='{{ route('events.edit', $event->id) }}'" class="btEditar" >Editar</button>
                            <button onclick="mostrarModal('{{ route('events.destroy', $event->id) }}')" class="btEditar">Eliminar</button>

                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>

        <div id="modalEliminar" class="modal" style="display: none;">
            <div class="modal-contenido">
                <p>¿Estás seguro de que deseas eliminar este Evento?</p>
                <button id="confirmarEliminar">Sí</button>
                <button id="cancelarEliminar">No</button>
            </div>
        </div>
        <script src="{{ asset('js/modal.js') }}"></script>

    </div>
@endsection