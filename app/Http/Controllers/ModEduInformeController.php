<?php

namespace App\Http\Controllers;

use App\Models\mod_edu_informe;
use Illuminate\Http\Request;

class ModEduInformeController extends Controller
{
    public function bannerData(){
        $datosTexto = mod_edu_informe::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $texto = new mod_edu_informe();
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

        $texto = mod_edu_informe::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = mod_edu_informe::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
