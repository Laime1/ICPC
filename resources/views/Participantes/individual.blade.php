@extends('layouts.app1')

@section('title', "Participantes")

<head>
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('style/formulario.css')}}">
</head>

@section('content')
    <form action="{{ route('participantes.store') }}" method="POST">
        <h1>Registrar participantes</h1>
        @csrf 
        <div class="form-group">
            <label for="rol">Evento</label>
            <select name="rol" id="rol">
                <option value="">Seleccionar Evento</option>
                @foreach($eventos as $event)
                    <option value="{{$event->name}}">{{$event->name}}</option>
                @endforeach
            </select>
        </div>

        <div id="participantes-container" class="participant-section">
            <label for="ci">Participantes</label>
        
            <div class="form-group1">
                <input type="text" name="ci[]" id="ci" placeholder="CI">
                <input type="text" name='nombre[]' id="nombre" placeholder="Nombre participante" readonly>
                
                @foreach($usuarios as $usuario)
                    <input type="hidden" class="usuario" data-ci="{{ $usuario->ci }}" data-nombre="{{ $usuario->name }}">
                @endforeach
            </div>
        
        </div>
        
        <div class="buttons">
            <button type="reset" class="btn btn-primary btn-cancelar">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

        <div class="register">
            @if (session('success'))
                <p>{{session('success')}}</p>
            @endif
        </div>
    </form>
    <script src="{{ asset('js/buscarCI.js') }}"></script>
@endsection
