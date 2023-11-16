<?php

namespace App\Http\Controllers;

use App\Models\chatButtons;
use Illuminate\Http\Request;

class ChatButtonsController extends Controller
{
    public function bannerData(){
        $datosTexto = chatButtons::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
            'identificador' => 'required|int|max:255',
        ]);

        // Create a new banner instance
        $texto = new chatButtons();
        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->identificador = $request->identificador;
        $texto->save();

        return response()->json('Text registered successfully');
    }

    public function editarBanner(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:10000',
            'identificador' => 'required|int|max:255',
        ]);

        $texto = chatButtons::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->identificador = $request->identificador;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = chatButtons::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
