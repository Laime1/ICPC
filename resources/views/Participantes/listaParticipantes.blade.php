@extends('layouts.app1')
<head>
    <title>Mostrar Datos</title>
    <link rel="stylesheet" href="{{asset('style/lista.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

</head>
@section('content')

<body>
    <h1>Datos de Participantes</h1>

    <div class="register" style="display: flex; justify-content: center; align-items: center;">
        @if (session('success'))
            <p>{{session('success')}}</p>
        @endif
    </div>
    

    <table id="table" class="table">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>CI</th>
                <th>Evento</th>
                <th>Grupo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            <tr>
                <td>{{ $dato->nombre }}</td>
                <td>{{ $dato->apellido }}</td>
                <td>{{ $dato->ci }}</td>
                <td>{{ $dato->evento }}</td>
                <td>{{ $dato->grupo }}</td>
                <td>
                    <button onclick="window.location.href='{{ route('participante.edit', $dato->id) }}'" class="btEditar" >Editar</button>
                    <button onclick="mostrarModal('{{ route('participante.destroy', $dato->id) }}')" class="btEditar">Eliminar</button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button onclick="exportarAExcel()">Exportar a Excel</button>


    <div id="modalEliminar" class="modal" style="display: none;">
        <div class="modal-contenido">
            <p>¿Estás seguro de que deseas eliminar este usuario?</p>
            <button id="confirmarEliminar">Sí</button>
            <button id="cancelarEliminar">No</button>
        </div>
    </div>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="{{ asset('js/exportarParticipantes.js') }}"></script>

        
    
</body>
@endsection
