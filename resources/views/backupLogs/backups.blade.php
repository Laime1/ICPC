@extends('layouts.app1')

@section('title', "Backups y logs")

<head>
    <style>

        #content-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #f0ebeb;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }


        button {
            background-color: #2ecc71;
            color: #fff;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        h1 {
            color: #333;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            color: #cf7a41;
        }

        .alert-danger {
            color: #d40b0b;
        }

        a.list-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #3498db;
            color: #3b0fda;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .logs {
            margin: auto;
            padding: 20px;
            background-color: #f0ebeb;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logs h2{
            text-align: center
        }

        pre {
            background-color: #f8f8f8;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: auto;
        }
    </style>
</head>

@section('content')
<div id="content-container">
    <ul>
        <h2>Lista de backups</h2>
        <p style="color: #c45616">Hacer clic para descargar</p>
        @foreach($archivos as $archivo)
            <li>
                <a style="color: blue" href="{{ route('descargar.backup', ['archivo' => basename($archivo)]) }}">
                    {{ basename($archivo) }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="ejecutar">
        <h2>Realizar Backup</h2>
        <form method="post" action="{{ url('/backup/run') }}">
            @csrf
            <button type="submit">Ejecutar Backup</button>
        </form>

        @if (session('message'))
        <div id="message" class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div id="error" class="alert alert-danger">
            <p>{{ session('error') }}</p>
        </div>
    @endif

    @if(session('success'))
        <div id="success" class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif

        <form method="get" action="{{ route('limpiar.backups') }}">
            @csrf
            <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar todos los backups?')">Limpiar Backups</button>
        </form>

    </div>

</div>


<script src="{{ asset('js/ocultarMensajes.js') }}"></script>
@endsection
