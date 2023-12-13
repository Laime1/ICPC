<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Participantes;
use Illuminate\Http\Request;

class ReportControler extends Controller
{
    //
    function reporteEvent()
    {
        $eventos = Event::all();
        return view('Reportes.event' , compact('eventos'));
    }

    function reporteEvent1(Request $request)
    {
        $eventNme = $request->input('evento');
        $evento = Event::where('name',$eventNme)->first();
        $participantes = Participantes::where('evento', $eventNme)->get(['nombre', 'apellido']);

        return view('Reportes.eventos',['evento' => $evento, 'participantes' => $participantes]);

    }


}