@extends('layouts.app1')

@section('title', "Participantes")

<head>
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style/formulario.css') }}">
</head>

@section('content')
    <div class="form-container">
        <form action="{{ route('participante.update', $participante->id) }}" method="POST">

            <h1>Actualizar Participante</h1>
            @csrf
            <div class="form-group">
                <label for="rol">Evento</label>
                <select name="rol" id="rol">
                    <option value="{{ $participante->evento }}">{{ $participante->evento }}</option>
                    @foreach($eventos as $event)
                        <option value="{{ $event->name }}">{{ $event->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="grupo">Añadir a grupo</label>
                <input type="text" name="grupo" id="grupo" value="{{ $participante->grupo }}">
            </div>

            <div class="form-group">
                <label for="calificacion">Añadir calificación</label>
                <input type="text" name="calificacion" id="calificacion" value="{{ $participante->calificacion }}">
            </div>

            <div id="participantes-container">
                <label for="ci">Participantes</label>
                <input type="text" name="ci" id="ci" value="{{ $participante->ci }}" readonly>
                <input type="text" name='nombre' id="nombre" value="{{ $participante->nombre }}" readonly>
            </div>

            <div class="buttons">
                <button type="reset" class="btn btn-cancelar">Cancelar</button>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>

            <div class="register" style="display: flex; justify-content: center; align-items: center;">
                @if (session('success'))
                    <p>{{ session('success') }}</p>
                @endif
            </div>

        </form>
    </div>
@endsection
