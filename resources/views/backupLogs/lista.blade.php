@extends('layouts.app1')

@section('title', "Backups y logs")

<head>
    <style>

        #content-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
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

        a {
            text-decoration: none;
            color: #3498db;
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
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .logs {
            margin: auto;
            padding: 20px;
            background-color: #71e0d0;
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

<div class="logs">
    <h2>Registros de Bitácora</h2>
    <pre>{{ $logs }}</pre>
</div>

<script src="{{ asset('js/ocultarMensajes.js') }}"></script>
@endsection
