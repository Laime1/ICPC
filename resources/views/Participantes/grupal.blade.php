@extends('layouts.app1')

@section('title', "Participantes")

<head>
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('style/formulario.css')}}">

</head>
@section('content')
   <form action="{{ route('participantes.store') }}" method="POST">
       <h1>Resgistrar participantes</h1>
       @csrf 
      <select name="rol" id="rol">
        <option value="">Evento</option>
        @foreach($eventos as $event)
        <option value="{{$event->name}}">{{$event->name}}</option>
        @endforeach
       </select>

       <input type="text" name="grupo" id="grupo" placeholder="Nombre del Grupo" >

    <div id="participantes-container">
        <label for="">Participantes</label>
    
        <input type="text" name="ci[]" id="ci" placeholder="CI" >
        <input type="text" name='nombre[]'id="nombre" placeholder="Nombre participante"  readonly>
    
        @foreach($usuarios as $usuario)
        <input type="hidden" class="usuario" data-ci="{{ $usuario->ci }}" data-nombre="{{ $usuario->name }}">
        @endforeach
    
        <button type="button" class="add-participant">Añadir Participante</button>
    </div>
    
    <div class="buttons">
        <button type="reset" class="btn btn-primary">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

    <div class="register" style="display: flex; justify-content: center; align-items: center;">
        @if (session('success'))
            <p>{{session('success')}}</p>
        @endif
    </div>

    </form>
    <script src="{{ asset('js/buscarCI.js') }}"></script>
    <script src="{{ asset('js/participantes.js') }}"></script>
@endsection