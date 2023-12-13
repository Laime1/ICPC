@extends('layouts.app1')

<head>
  <title>Edicion</title>
  <link rel="stylesheet" href="{{asset('style/Registroevento.css')}}">

</head>
@section('content')

<div class="container">
    @if (session('success'))
    <li>{{session('success')}}</li>
@endif
    
    <form method="POST" action="{{ route('events.update',$event->id) }}" enctype="multipart/form-data">
      <h1>Actualizar evento de {{$event->tipe}}</h1>
      @csrf <!-- Agrega el token CSRF para protección contra ataques CSRF -->
        <div class="form-group">
          <input type="hidden" name="tipe" id="tipe" value="{{$event->tipe}}">
          <label for="event_titulo">Titulo:</label><br>
          <input type="text" id="name" name="name" value="{{$event->name}}"><br>
          @error('name') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span><br> @enderror

          <label for="event_date">Fecha:</label><br>
          <input type="date" id="date" name="date" value="{{$event->date}}"><br>
          @error('date') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span><br> @enderror

          <label for="event_time">Hora:</label><br>
          <input type="time" id="time" name="time" value="{{$event->time}}"><br>
          @error('time') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span><br> @enderror

          <label for="location">Lugar:</label><br>
          <input type="text" id="location" name="location" value="{{$event->location}}"><br>
          @error('location') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span><br> @enderror

          <label for="">imagen:</label>
          <input type="file" name="image" id="image" value="{{$event->image}}">
          <label for="description">Descripción:</label>
          
          <textarea id="description" name="description">
            {{$event->description}}
          </textarea>
          <label for="">Organizador</label>
          <input type="text" name="organizer" id="oraganizer" value="{{$event->organizer}}">
          @error('organizer') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span><br> @enderror


        <div class="buttons">
        <button type="reset" class="btn btn-primary">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

        <div class="register">
          @if (session('success'))
            <p>{{session('success')}}</p>
          @endif
        </div>

    </form>
</div>

@endsection
