<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/LogController.php

use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function showLogs()
    {
        $logPath = storage_path('logs/laravel.log');
        
        // Verificar si el archivo de registro existe
        if (File::exists($logPath)) {
            $logs = File::get($logPath);
            return view('logs.show', compact('logs'));
        } else {
            return 'No se encontró el archivo de registro.';
        }
    }
}

