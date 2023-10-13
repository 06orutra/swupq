<?php

namespace App\Http\Controllers;

use App\Models\SpotyPoliPolo;
use Illuminate\Http\Request;

class SpotyPoliPoloController extends Controller
{
    public function bannerData(){
        $datosTexto = SpotyPoliPolo::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $texto = new SpotyPoliPolo();
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

        $texto = SpotyPoliPolo::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = SpotyPoliPolo::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }  
}
