<!-- resources/views/create.blade.php -->
@extends('layouts.app1')

@section('title', "$parametro")

<head>
    <link rel="stylesheet" href="{{asset('style/Registroevento.css')}}">
</head>
@section('content')

<div class="container block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg">


    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
      <h1>Crear evento de {{$parametro}}</h1>
        @csrf <!-- Agrega el token CSRF para protección contra ataques CSRF -->
        <div class="form-group">
          <input type="hidden" name="tipe" id="tipe" value="{{$parametro}}">
          <label for="event_titulo">*Nombre:</label><br>
          <input type="text" id="name" name="name" placeholder="Nombre del Evento"><br>
          @error('name') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span><br> @enderror
          <label for="event_date">*Fecha de Evento:</label><br>
          <input type="date" id="date" name="date" ><br>
          @error('date') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span><br> @enderror
          <label for="event_time">*Hora de Evento:</label><br>
          <input type="time" id="time" name="time"><br>
          @error('time') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span><br> @enderror
          <label for="location">*Lugar:</label><br>
          <input type="text" id="location" name="location" placeholder="Ubicacion de Evento"><br>
          @error('location') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span><br> @enderror
          <label for="">imagen:</label>
          <input type="file" name="image" id="image">
          <label for="description">*Descripción:</label>
          
          <textarea id="escription" name="description"></textarea>
          <label for="organizer">*Organizador:</label>

          <div class="organizador">
          <input type="text" name="organizer" id="ci" placeholder="CI" >
          <input type="text" name='nombre' id="nombre" placeholder="Nombre del Organizador"  readonly>
          </div>
          @error('organizer') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span><br> @enderror
           
          @foreach($usuarios as $usuario)
           <input type="hidden" class="usuario" data-ci="{{ $usuario->ci }}" data-nombre="{{ $usuario->name }}">
          @endforeach


        <div class="buttons">
        <button type="reset" class="btn btn-primary">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

        <div class="register">
          @if (session('success'))
            <p>{{session('success')}}</p>
          @endif
        </div>
      </div>
    </form>
    <script src="{{ asset('js/buscarCI.js') }}"></script>

</div>
@endsection
