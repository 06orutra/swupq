<?php

namespace App\Http\Controllers;

use App\Models\historia_texto;
use Illuminate\Http\Request;

class HistoriaTextoController extends Controller
{
    public function bannerData(){
        $datosTexto = historia_texto::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
        ]);

        // Create a new banner instance
        $texto = new historia_texto();
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

        $texto = historia_texto::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = historia_texto::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
