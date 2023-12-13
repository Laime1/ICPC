
<x-app-layout>

<head>
    <link rel="stylesheet" href="{{asset('style/Registroevento.css')}}">
    <title>Edicion de Usuarios</title>
</head>

<body>
<div class="container">
    @if (session('success'))
    <li>{{session('success')}}</li>
    @endif


    <form method="post" action="{{ route('actualizarUsuario',$usuario->id) }}" >
        @csrf <!-- Agrega el token CSRF para protección contra ataques CSRF -->
        <h1>Actualizacion de Usuarios</h1>
        <div class="selected">
            <b >*</b>  
           <select name="rol" id="rol">
                <option value="{{$usuario->rol}}">{{$usuario->rol}}</option>
                <option value="Estudiante">Estudiante</option>
                <option value="Coach">Coach</option>
                <option value="Administrador">Administrador</option>
            </select>
        </div>
        <div class="form-group1">
            <label for="name">Nombres:</label>
            <input type="text" name="name" id="name" value="{{$usuario->name}}"class="form-control">
            @error('name') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span> @enderror

        </div>
        <div class="form-group1">
            <label for="last_name">Apellidos:</label>
            <input type="text" name="last_name" id="last_name" value="{{$usuario->last_name}}" class="form-control">
            @error('last_name') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span> @enderror

        </div>
        <div class="form-group1">
            <label for="ci">CI:</label>
            <input type="text" name="ci" id="ci" value="{{$usuario->ci}}" class="form-control">
            @error('ci') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span> @enderror

        </div>
        <div class="form-group1">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{$usuario->email}}" class="form-control">
            @error('email') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span> @enderror

        </div>
        <div class="form-group1">
            <label for="phone">Telefono:</label>
            <input type="text" name="phone" id="phone" value="{{$usuario->phone}}" class="form-control">
            @error('phone') <span class="error text-red-700 font-anek block" role="alert" >{{ $message }}</span> @enderror

        </div>
        
        <div class="buttons">
            <button type="submit" name="accion" value="cancelar" class="btn btn-primary">Cancelar</button>
            <button type="submit" name="accion" value="guardar" class="btn btn-primary">Guardar</button>
        </div>
    </form>

    
</div>

</body>
</x-app-layout>
