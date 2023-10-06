<?php

namespace App\Http\Controllers;

use App\Models\textoPrueba;
use Illuminate\Http\Request;

class TextoPruebaController extends Controller
{
    public function bannerData(){
        $datosTexto = textoPrueba::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $texto = new textoPrueba();
        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text registered successfully');
    }

    public function editarBanner(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
        ]);

        $texto = textoPrueba::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = textoPrueba::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
