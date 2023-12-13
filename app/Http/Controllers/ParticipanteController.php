<?php

namespace App\Http\Controllers;

use App\Notifications\WelcomeNotification;
use App\Notifications\ParticipanteRegistrado;
use App\Models\Participantes;
use App\Models\User;
use App\Models\Usuario;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipanteController extends Controller
{
    public function create()
    {
        $eventos = DB::table('eventos')->select('name')->get();
        $usuarios = User::select('name', 'ci')->get();
        return view('Participantes.grupal', ['eventos' => $eventos, 'usuarios' => $usuarios]); // Retorna la vista 

    }
    public function create1()
    {
        $eventos = DB::table('eventos')->select('name')->get();
        $usuarios = User::select('name', 'ci')->get();
        return view('Participantes.individual', ['eventos' => $eventos, 'usuarios' => $usuarios]); // Retorna la vista 

    }
    public function store(Request $request)
    {
    $event = $request->input('rol');
    $groupName = $request->input('grupo');
    $ciList = $request->input('ci');
    $nombreList = $request->input('nombre');

    
    // Suponiendo que tienes un modelo llamado Participante que representa la tabla de participantes
    foreach ($ciList as $key => $ci) {
        $nombre = $nombreList[$key];
        $participante = new Participantes;
        $participante->ci = $ci;

        $usuario = User::where('ci', $ci)->first(); // 
        if ($usuario) {
            $apellido = $usuario->last_name;
            $participante->apellido = $apellido;
        }

        $participante->nombre = $nombre;
        $participante->evento = $event;
        $participante->grupo = $groupName;
        $participante->save();
      
         
    
         // Verificamos si se encontró el usuario
        if ($usuario) {
            // Enviar la notificación al usuario
            $usuario->notify(new ParticipanteRegistrado());
        }

    }

        return redirect('/events/participe')->with('success', 'Participante(s) registrados con éxito');//   realiza alguna acción después de guardar los participantes.
    }

    public function index()
    {
        $datos = Participantes::orderBy('nombre', 'asc')->get();
        return view('Participantes.listaParticipantes', compact('datos'));

    }

    public function edit($id)
{
    $eventos = DB::table('eventos')->select('name')->get();
    $participante = Participantes::firstOrCreate(['id' => $id]);
    return view('Participantes.editar', ['eventos' => $eventos, 'participante' => $participante]);
}

public function update(Request $request, $id)
{
    $event = $request->input('rol');
    $groupName = $request->input('grupo');
    $ci = $request->input('ci');
    $nombre = $request->input('nombre');
    $calificacion = $request->input('calificacion');

    // Suponiendo que tienes un modelo llamado Participante que representa la tabla de participantes
    $participante = Participantes::find($id);
    $participante->ci = $ci;

    $usuario = User::where('ci', $ci)->first(); // Suponiendo que existe una relación entre User y Participantes
    if ($usuario) {
        $apellido = $usuario->last_name;
        $participante->apellido = $apellido;
    }

    $participante->nombre = $nombre;
    $participante->evento = $event;
    $participante->grupo = $groupName;
    $participante->calificacion = $calificacion; // Añadir la calificación

    $participante->save();


    return redirect('/events/participe')->with('success', 'Participante actualizado con éxito');
}


    public function destroy($id)
{
    //$usuario =Usuario::find($id);
    $deleted=DB::delete('DELETE FROM participantes WHERE id = ?', [$id]);
    if ($deleted) {
        //$usuario->delete();
        return redirect()->route('participantes.index')->with('success', "Participante , eliminado correctamente.");
    } else {
        return redirect()->route('participantes.index')->with('error', 'No se pudo encontrar el Participante.');
    }
}
}