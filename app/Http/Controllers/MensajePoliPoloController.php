<?php

namespace App\Http\Controllers;

use App\Models\Mensaje_PoliPolo;
use Illuminate\Http\Request;

class MensajePoliPoloController extends Controller
{
    public function bannerData(){
        $datosTexto = Mensaje_PoliPolo::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $texto = new Mensaje_PoliPolo();
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

        $texto = Mensaje_PoliPolo::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = Mensaje_PoliPolo::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }  
}
