<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{


  protected $messages = [
    'name.required' => 'Este campo es obligatorio',
    'name.regex' => 'Solo se admiten letras',
    'name.max' => 'Maximo 50 caracteres',


    'date.required' => 'Este campo es obligatorio',
    'date.after_or_equal' => 'No se admiten fechas anteriores',

    'time.required' => 'Este campo es obligatorio',

    'location.required' => 'Este campo es obligatorio',
    'location.regex' =>  'Solo se admiten letras, "/" y espacios',
    'location.max' => 'Maximo 80 caracteres',


    'organizer.required' => 'Este campo es obligatorio',
    'organizer.max' => 'Maximo 10 caracteres',
];

public function create(Request $request)
{
    $usuarios = User::select('name', 'ci')->get();
    $parametro = $request->query('parametro'); // Accede al valor del parámetro "parametro"
    return view('Event.create', ['parametro' => $parametro, 'usuarios' => $usuarios]);
    // Retorna la vista de creación de eventos
}

public function store(Request $request)
{
    // Validar los datos (puedes usar la validación de Laravel)
   /* $request->validate([
    ]);*/
    
    $validatedData = [
        'name' => 'required|regex:/^[A-Za-z\s]+$/|max:50',
        'date' => "required|after_or_equal:" . date('Y-m-d'),
        'time' => 'required',
        'location' => 'required|regex:/^[A-Za-z\s\/]+$/|max:80',
        'organizer' => 'required',
    ];

    $validator = Validator::make($request->all(), $validatedData, $this->messages);

// Comprobar si la validación ha fallado
    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
     }

    // Crear una nueva instancia del modelo Event y asignar los datos del formulario
    $event = new Event;
    $event->tipe = $request->input('tipe');
    $event->name = $request->input('name');
    $event->date = $request->input('date');
    $event->time = $request->input('time');
    $event->location = $request->input('location');
    $event->description = $request->input('description');
    $event->organizer = $request->input('organizer');
    if ($request->hasFile('image')) {
        $imageData = file_get_contents($request->file('image')->path());
        $event->image = $imageData;
    }

    // Guardar el evento en la base de datos
    $event->save();

    return redirect('/events/create')->with('success', 'Evento guardado exitosamente');
}

  public function index(Request $request)
    {
        $parametro = $request->query('parametro');
        // Recupera todos los eventos de la base de datos
        $events = Event::all();

        // Carga la vista 'Event.index.blade.php' y pasa los eventos a la vista
        return view('Event.index', ['events' => $events, 'parametro' => $parametro]);
    }


    public function edit($id)
    {
     $event = Event::firstOrCreate(['id' => $id]);
     return view('Event.edit', compact('event'));
 
    }
    
    public function update(Request $request,$id)
    {
     $validatedData = [
         'name' => 'required|regex:/^[A-Za-z\s]+$/|max:50',
         'time' => 'required',
         'location' => 'required|regex:/^[A-Za-z\s\/]+$/|max:80',
         'organizer' => 'required',
     ];
 
     $validator = Validator::make($request->all(), $validatedData, $this->messages);
 
 // Comprobar si la validación ha fallado
     if ($validator->fails()) {
       return back()->withErrors($validator)->withInput();
      }
 
 
 
     $event=Event::find($id);
         $event->tipe = $request->input('tipe');
         $event->name = $request->input('name');
         $event->date = $request->input('date');
         $event->time = $request->input('time');
         $event->location = $request->input('location');
         $event->description = $request->input('description');
         $event->organizer = $request->input('organizer');
 
         if ($request->hasFile('image')) {
             $imageData = file_get_contents($request->file('image')->path());
             $event->image = $imageData;
         }
         $event->save();
 
         if($event){
             return redirect()->route('listaDeEventos', ['parametro' => $event->tipe])
                         ->with('success', 'Evento Actualizado correctamente.');
             }else{
                 return redirect('/events/list')->with('success', 'Edicion cancelada');
             }
 
    }
    
    public function destroy($id)
   {
     //$usuario =Usuario::find($id);
     $event = Event::firstOrCreate(['id' => $id]);
 
     $deleted=DB::delete('DELETE FROM eventos WHERE id = ?', [$id]);
     if ($deleted) {
         // Redirige a la lista de eventos con el parámetro 'tipe'
         return redirect()->route('listaDeEventos', ['parametro' => $event->tipe])
                         ->with('success', 'Evento eliminado correctamente.');
     } else {
         return redirect()->route('listaDeEventos')->with('error', 'No se pudo encontrar el evento.');
     }
      
   }
 
    public function ruleta()
    {
      $eventos = Event::all();      
      return view('vistas.ruleta', compact('eventos'));
    }

    public function showImage($id)
  {
    $event = Event::find($id);

    if ($event && $event->image) {
        // Obtener los datos de la imagen y establecer el tipo de contenido
        $imageData = $event->image;
        $contentType = 'image/jpeg'; // Ajusta el tipo de contenido según el formato de la imagen

        // Devolver la imagen como respuesta
        return response($imageData)
            ->header('Content-Type', $contentType);
    }

    // Manejar el caso en el que no se encuentra la imagen
    return response('Imagen no encontrada', 404);
  }

  public function vistaEvento($id){
    $evento = Event::firstOrCreate(['id' => $id]);
    return view('vistas.verEvento', compact('evento'));
  }
  
}
