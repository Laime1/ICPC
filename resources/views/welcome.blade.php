<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos de Programación</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #4d728a 40%, #a86b64 60%);
            color: #fff;
        }

        header {
            background-color: rgba(106, 109, 134, 0.369);
            padding: 20px 0;
            text-align: center;
        }

        section {
            padding: 40px 20px;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Añadido para dar espacio entre el texto y los botones */
        }

        .btn {
            display: inline-block;
            padding: 15px 30px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
            text-align: center;
            margin: 0 10px;
            font-size: 16px;
        }

        .btn-login {
            background-color: #3498db;
        }

        .btn-register {
            background-color: #e74c3c;
        }

        .btn:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>

    <header>
        <h1>¡Bienvenido a ICPC!</h1>
    </header>

    <section>
        <div class="container">
            <p>Descubre y participa en emocionantes eventos de programación. Conéctate con la comunidad, mejora tus habilidades y mantente al tanto de las últimas tendencias.</p>
            <div class="btn-container">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-login">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-login">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-register">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </section>

</body>
</html>
