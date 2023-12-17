<!-- resources/views/backup.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Backup</title>
</head>
<body>

    <h1>Realizar Backup</h1>

    <form method="post" action="{{ url('/backup/run') }}">
        @csrf
        <button type="submit">Ejecutar Backup</button>
    </form>

</body>
</html>
