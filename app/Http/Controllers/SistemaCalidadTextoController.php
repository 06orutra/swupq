<?php

namespace App\Http\Controllers;

use App\Models\sistemaCalidadTexto;
use Illuminate\Http\Request;

class SistemaCalidadTextoController extends Controller
{
    public function bannerData(){
        $datosTexto = sistemaCalidadTexto::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
        ]);

        // Create a new banner instance
        $texto = new sistemaCalidadTexto();
        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text registered successfully');
    }

    public function editarBanner(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
        ]);

        $texto = sistemaCalidadTexto::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = sistemaCalidadTexto::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
