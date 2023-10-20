<?php

namespace App\Http\Controllers;

use App\Models\informe_rector;
use Illuminate\Http\Request;

class InformeRectorController extends Controller
{
    public function bannerData(){
        $datosTexto = informe_rector::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
            //'url' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $texto = new informe_rector();
        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        //$texto->url = $request->url;
        $texto->save();

        return response()->json('Text registered successfully');
    }

    public function editarBanner(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
            //'url' => 'required|string|max:255',
        ]);

        $texto = informe_rector::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        //$texto->url = $request->url;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = informe_rector::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
