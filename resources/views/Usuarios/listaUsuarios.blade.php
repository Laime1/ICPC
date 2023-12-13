<x-app-layout>
<head>
    <title>Mostrar Datos</title>
    <link rel="stylesheet" href="{{asset('style/lista.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
</head>


<body>
    @if (session('success'))
    <li>{{session('success')}}</li>
    @endif
    <h1>Datos de Usuarios</h1>
    <table id="table" class="table">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>CI</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            <tr>
                <td>{{ $dato->name }}</td>
                <td>{{ $dato->last_name }}</td>
                <td>{{ $dato->ci }}</td>
                <td>{{ $dato->email }}</td>
                <td>{{ $dato->phone }}</td>
                <td>
                    <button onclick="window.location.href='{{ route('editarUsuario', $dato->ci) }}'" class="btEditar" >Editar</button>
                    <button onclick="mostrarModal('{{ route('eliminarUsuario', $dato->ci) }}')" class="btEditar">Eliminar</button>

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
    <script src="{{ asset('js/exportarUsuarios.js') }}"></script>
          
    
</body>
</x-app-layout>

