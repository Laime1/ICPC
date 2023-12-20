<?php

// app/Http/Controllers/BackupController.php

// app/Http/Controllers/BackupController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;

use Spatie\Backup\Tasks\Backup\BackupJob;
use Spatie\Backup\BackupDestination\BackupDestinationFactory;
use Illuminate\Support\Facades\Log;




use Illuminate\Support\Facades\File;


class BackupController extends Controller
{
    public function listarBackups()
{
    // Obtener la lista de archivos en el directorio
    $archivos = Storage::files('/backup-temp/temp/db-dumps');

    return view('backupLogs.backups', compact('archivos'));
}

public function mostrarLogs()
{
    $logPath = storage_path('logs/laravel.log');

// Verificar si el archivo de registro existe
if (file_exists($logPath)) {
    // Leer el contenido del archivo de log
    $logContent = file_get_contents($logPath);

    // Dividir las líneas del archivo de log
    $logLines = explode("\n", $logContent);

    // Filtrar las líneas que contienen registros de tipo 'info'
    $infoLogs = array_filter($logLines, function ($line) {
        return strpos($line, 'local.INFO') !== false;
    });

    // Unir las líneas filtradas nuevamente en una cadena
    $logs = implode("\n", $infoLogs);

        return view('backupLogs.lista', compact('logs'));
    } else {
        return 'No se encontró el archivo de registro.';
    }
}



    public function descargarBackup($archivo)
    {
        $rutaArchivo = storage_path("app/backup-temp/temp/db-dumps/{$archivo}");

        return response()->download($rutaArchivo);
    }

    public function realizarBackup()
{
    try {
        // Ejecutar la tarea de backup
        Artisan::call('backup:run');

        // Registrar un mensaje de información

        return response()->json(['success' => true, 'message' => 'Backup realizado con éxito']);
        Log::info('Se ha realizado un backup con éxito');

    } catch (\Exception $e) {
        // Registrar un mensaje de error en el log
        Log::error('Error al realizar el backup: ' . $e->getMessage());

        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

    public function limpiarBackups()
{
    // Directorio donde se almacenan los archivos de backup
    $directorioBackups = 'ICPC';

    try {
        // Obtener la lista de archivos en el directorio de backups
        $archivos = Storage::files($directorioBackups);

        // Iterar sobre cada archivo y eliminarlo
        foreach ($archivos as $archivo) {
            Storage::delete($archivo);
        }

        // Loggear la acción de limpiar los backups
        Log::info('Se han eliminado todos los backups');

        // Almacenar mensaje de éxito en la sesión
        session()->flash('success', 'Se han eliminado todos los backups correctamente.');

    } catch (\Exception $e) {
        // Loggear cualquier error que ocurra durante la eliminación de los backups
        Log::error('Error al intentar eliminar backups: ' . $e->getMessage());

        // Almacenar mensaje de error en la sesión
        session()->flash('error', 'Ocurrió un error al intentar eliminar los backups.');
    }

    // Redirigir de nuevo a la vista
    return redirect()->back();
}

    
}

