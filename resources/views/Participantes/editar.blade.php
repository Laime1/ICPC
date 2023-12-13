@extends('layouts.app1')

@section('title', "Participantes")

<head>
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('style/formulario.css')}}">

</head>
@section('content')
   <form action="{{ route('participantes.store') }}" method="POST">
       <h1>Actualizar Participante</h1>
       @csrf 
      <select name="rol" id="rol">
        <option value="{{$participante->evento}}">{{$participante->evento}}</option>
        @foreach($eventos as $event)
        <option value="{{$event->name}}">{{$event->name}}</option>
        @endforeach
       </select>

       <input type="text" name="grupo" id="grupo" placeholder="Añadir a grupo" value="{{$participante->grupo}}" >

    <div id="participantes-container">
        <label for="">Participantes</label>
    
        <input type="text" name="ci" id="ci" value="{{$participante->ci}}" readonly>
        <input type="text" name='nombre'id="nombre" value="{{$participante->nombre}}"  readonly>
    
    </div>
    
    <div class="buttons">
        <button type="reset" class="btn btn-primary">Cancelar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>

    <div class="register" style="display: flex; justify-content: center; align-items: center;">
        @if (session('success'))
            <p>{{session('success')}}</p>
        @endif
    </div>

    </form>
@endsection