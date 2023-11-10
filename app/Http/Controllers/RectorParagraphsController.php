<?php

namespace App\Http\Controllers;

use App\Models\rectorParagraphs;
use Illuminate\Http\Request;

class RectorParagraphsController extends Controller
{
    public function bannerData(){
        $datosTexto = rectorParagraphs::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:20000',
        ]);

        // Create a new banner instance
        $texto = new rectorParagraphs();
        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text registered successfully');
    }

    public function editarBanner(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:20000',
        ]);

        $texto = rectorParagraphs::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = rectorParagraphs::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
