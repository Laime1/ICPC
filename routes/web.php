<?php

use Illuminate\Support\Facades\Route;
use App\Models\Event; 
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\ReportControler;
use App\Http\Controllers\BackupController;
use Illuminate\Support\Facades\Log;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $eventos = Event::all();
        return view('dashboard', ['eventos' => $eventos]);
    })->name('dashboard');
});

Route::get('image/{id}', [EventController::class, 'showImage'])->name('image.show');//para mostrar la imagen
Route::get('/view/event/{id}', [EventController::class, 'vistaEvento'])->name('vistaEvento');


//Eventos
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/list',[EventController::class, 'index'])->name('listaDeEventos');
Route::get('download-pdf/{id}', [EventController::class, 'downloadPdf'])->name('download-pdf');//para mostrar el pdf
Route::get('image/{id}', [EventController::class, 'showImage'])->name('image.show');//para mostrar la imagen
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');//para el boton editar
Route::post('/events/update/{id}', [EventController::class, 'update'])->name('events.update');//para actualizar los eventos
Route::get('/events/destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/ruleta', [EventController::class, 'ruleta'])->name('events.ruleta');


//participantes
Route::get('/events/participe', [ParticipanteController::class, 'create'])->name('participantes.create');
Route::get('/events/participe1', [ParticipanteController::class, 'create1'])->name('participante.create');
Route::get('/events/list/participe',[ParticipanteController::class, 'index'])->name('participantes.index');
Route::post('/participante', [ParticipanteController::class, 'store'])->name('participantes.store');
Route::get('/events/participe/destroy/{id}', [ParticipanteController::class, 'destroy'])->name('participante.destroy');
Route::get('/events/participe/{id}', [ParticipanteController::class, 'edit'])->name('participante.edit');
Route::post('/events/participe/update/{id}', [ParticipanteController::class, 'update'])->name('participante.update');


//Reportes
Route::get('/reports/event', [ReportControler::class, 'reporteEvent'])->name('report.event');
Route::post('/reports/eventos', [ReportControler::class, 'reporteEvent1'])->name('report.event1');

//usuarios
Route::get('/users/list',[RegistroController::class, 'index'])->name('listaDeUsuarios');
Route::get('/users/edit/{id}', [RegistroController::class, 'edit'])->name('editarUsuario');
Route::post('/users/update/{id}', [RegistroController::class, 'update'] )->name('actualizarUsuario');
Route::get('/users/destroy/{id}', [RegistroController::class, 'destroy'])->name('eliminarUsuario');

//Participantes
Route::get('/events/participe', [ParticipanteController::class, 'create'])->name('participantes.create');
Route::get('/events/participe1', [ParticipanteController::class, 'create1'])->name('participante.create');
Route::get('/events/list/participe',[ParticipanteController::class, 'index'])->name('participantes.index');
Route::post('/participante', [ParticipanteController::class, 'store'])->name('participantes.store');
Route::get('/events/participe/destroy/{id}', [ParticipanteController::class, 'destroy'])->name('participante.destroy');
Route::get('/events/participe/{id}', [ParticipanteController::class, 'edit'])->name('participante.edit');

//Reportes
Route::get('/reports/event', [ReportControler::class, 'reporteEvent'])->name('report.event');
Route::post('/reports/eventos', [ReportControler::class, 'reporteEvent1'])->name('report.event1');

// routes/web.php

Route::get('/descargar-backup/{archivo}', [BackupController::class, 'descargarBackup'])->name('descargar.backup');
Route::get('/listar-backups', [BackupController::class, 'listarBackups'])->name('listar.backups');
Route::get('/mostrar-logs', [BackupController::class, 'mostrarLogs'])->name('mostrar.logs');



Route::get('/limpiar-backups', [BackupController::class, 'limpiarBackups'])->name('limpiar.backups');


Route::get('/backup', function () {
    return view('backup');
});

Route::post('/backup/run', function () {
    set_time_limit(120); // Ajusta el tiempo límite según tus necesidades

    // Ejecutar el comando Artisan backup:run
    $output = shell_exec('php ' . base_path('artisan') . ' backup:run');
  Log::info('Se ha realizado un backup con éxito');

        // El backup se realizó con éxito
        return redirect()->back()->with('message', 'Backup completado exitosamente');
    
});




