<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\Validator;

class PersonaControllerWeb extends Controller
{
    public function Crear(Request $request){
        $validacion = $this -> validacion($request->all());
        if($validacion->fails())
            return view("personas",["errors" => $validacion->errors()]);
        return $this -> crearPersona($request);
    }

    private function validacion($data){
        return Validator::make($data,[
            'nombre' => 'required|alpha|max:30|min:3',
            'segundo_nombre' => 'nullable|alpha|max:100|min:3',
            'apellido' => 'required|alpha|max:30|min:3',
            'codigo' => 'required|numeric|max:255',
            'email' => 'required|email|unique:personas',
        ],
        [
            'nombre.alpha' => 'Pone letras macho.',
            'nombre.required' => 'Mande un nombre don.',
            'codigo.required' => 'Mande un codigo amigo.',
            'email.email' => 'Eso no es un email.',
            'email.unique' => 'Email afanao',
        ]);
    }

    private function crearPersona($request){
        $p = new Persona();
        $p -> nombre = $request->post("nombre");
        $p -> segundo_nombre = $request->post("segundo_nombre");
        $p -> apellido = $request->post("apellido");
        $p -> codigo = $request->post("codigo");
        $p -> email = $request->post("email");
        $p -> save();
        return view("personas",[ "exito" => true ]);

    }
}











/*


        [
            'nombre.alpha' => 'Pone letras macho.',
            'nombre.required' => 'Mande un nombre don.',
            'codigo.required' => 'Mande un codigo amigo.',
            'email.email' => 'Eso no es un email.',
            'email.unique' => 'Email afanao',
        ]

*/