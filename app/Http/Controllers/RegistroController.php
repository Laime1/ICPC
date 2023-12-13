<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\WelcomeNotification;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    //

    protected $messages = [
        'name.required' => 'Este campo es obligatorio',
        'name.regex' => 'Solo se admiten letras',
        'name.max' => 'Maximo 50 caracteres',
    
        'last_name.required' => 'Este campo es obligatorio',
        'last_name.regex' => 'Solo se admiten letras',
        'last_name.max' => 'Maximo 50 caracteres',
    
        'ci.required' => 'Este campo es obligatorio',
        'ci.unique' => 'Este CI ya existe',
        'ci.regex' => 'Obligatorio 6 números seguidos, opcional 2 alfanuméricos',
        'ci.max' => 'Maximo 9 digitos',
    
        'phone.required' => 'Este campo es obligatorio',
        'phone.regex' => 'Solo se admiten números',
        'phone.min' => 'Minimo 8 digitos',
    
        'email.required' => 'Este campo es obligatorio',
        'email.unique' => 'Este correo ya existe',
        'email.email' => 'Correo electrónico inválido',
        'email.regex' => 'Solo se admite @, letras, números, puntos',
    
        'password.required' => 'Este campo es obligatorio',
        'password.max' => 'Maximo 20 caracteres',
    ];

    public function index()
    {
        $datos = User::orderBy('name', 'asc')->get();
        return view('Usuarios.listaUsuarios', compact('datos'));

    }

    public function edit($ci)
{
    $usuario = User::firstOrCreate(['ci' => $ci]);
    return view('Usuarios.editarUsuarios', compact('usuario'));
}

public function update(Request $request,$id)
{
    //validando datos
    $validatedData = [

        'name' => 'required|regex:/^[A-Za-z\s]+$/|max:50',
        'last_name' => 'required|regex:/^[A-Za-z\s]+$/|max:50',
        'ci' => 'required|regex:/^[0-9]{6,9}(?:[A-Za-z0-9]{2})?$/|max:9',
        'phone' => 'required|regex:/^[0-9]+$/|min:8',
        'email' => 'required|email|regex:/^[A-Za-z0-9.@]+$/',
        'rol'=>'required',
       //reglas de validación según las necesidades
    ];
    $validator = Validator::make($request->all(), $validatedData, $this->messages);


    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }
    
    $usuario=User::find($id);
    $usuario->name=$request->input('name');
    $usuario->rol=$request->input('rol');
    $usuario->last_name=$request->input('last_name');
    $usuario->ci=$request->input('ci');
    $usuario->email=$request->input('email');
    $usuario->phone=$request->input('phone');

    $usuario->save();

    if($usuario){
    return redirect('/users/list')->with('success', 'Usuario actualizado con éxito');
    }else{
        return redirect('/users/list')->with('success', 'Edicion cancelada');
    }
}
public function destroy($id)
{
    //$usuario =Usuario::find($id);
    $deleted=DB::delete('DELETE FROM users WHERE ci = ?', [$id]);
    if ($deleted) {
        //$usuario->delete();
        return redirect()->route('listaDeUsuarios')->with('success', "Usuario , eliminado correctamente.");
    } else {
        return redirect()->route('listaDeUsuarios')->with('error', 'No se pudo encontrar el usuario.');
    }
}
}
