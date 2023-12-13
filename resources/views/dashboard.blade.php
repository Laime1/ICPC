<x-app-layout>

    <head>
    
        <!-- css de la libería -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">
        <link rel="stylesheet" href="{{asset('style/estilos.css')}}">
        <title>Home</title>
    </head>
    @section('content')
    
        <h1>Carrusel de Eventos</h1>
        <!-- Estas dos son clases de la libería -->
        <div class="gallery js-flickity"
            data-flickity-options = '{"wrapAround":true}'> <!-- Sirve para que las fotos puedan deslizarse desde la primera a la ultima y de la ultima a la primera -->
            @foreach ($eventos as $event)
            <div class="gallery-cell">
              <a href="{{ route('vistaEvento', $event->id) }}" >
                <img src="{{ route('image.show', $event->id) }}" alt="Imagen">
                <h1>{{$event->name}}</h1>
             </a>
            </div>
            @endforeach
            
        </div>
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        
            
    
        <!-- script de la libería -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"> </script>    

</x-app-layout>