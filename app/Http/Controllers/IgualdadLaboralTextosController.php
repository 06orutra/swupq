<?php

namespace App\Http\Controllers;

use App\Models\igualdadLaboralTextos;
use Illuminate\Http\Request;

class IgualdadLaboralTextosController extends Controller
{
    public function bannerData(){
        $datosTexto = igualdadLaboralTextos::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
        ]);

        // Create a new banner instance
        $texto = new igualdadLaboralTextos();
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

        $texto = igualdadLaboralTextos::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = igualdadLaboralTextos::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
