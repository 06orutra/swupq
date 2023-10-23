<?php

namespace App\Http\Controllers;

use App\Models\lenguaExtra_objetivos;
use Illuminate\Http\Request;

class LenguaExtraObjetivosController extends Controller
{
    public function bannerData(){
        $datosTexto = lenguaExtra_objetivos::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $texto = new lenguaExtra_objetivos();
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

        $texto = lenguaExtra_objetivos::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = lenguaExtra_objetivos::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
