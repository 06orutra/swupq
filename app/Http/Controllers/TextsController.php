<?php

namespace App\Http\Controllers;

use App\Models\Texts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TextsController extends Controller
{
    public function textoData(){
        $datosTexto = Texts::all();
        return response()->json($datosTexto);
    }

    public function registrarTexto(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $texto = new Texts();
        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text registered successfully');
    }

    public function editarTexto(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
        ]);

        $texto = Texts::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarTexto(Request $request){
        $texto = Texts::find($request->id);
        //eliminar la imagen del storage
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
