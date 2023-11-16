<?php

namespace App\Http\Controllers;

use App\Models\chatResponse;
use Illuminate\Http\Request;

class ChatResponseController extends Controller
{
    public function bannerData(){
        $datosTexto =  chatResponse::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'enlace' => 'required|string|max:10000',
            'correlacion' => 'required|int|max:255',
        ]);

        // Create a new banner instance
        $texto = new  chatResponse();
        $texto->nombre = $request-> nombre;
        $texto->enlace = $request->enlace;
        $texto->correlacion = $request->correlacion;
        $texto->save();

        return response()->json('Text registered successfully');
    }

    public function editarBanner(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'enlace' => 'required|string|max:10000',
            'correlacion' => 'required|int|max:255',
        ]);

        $texto =  chatResponse::find($request->id);

        $texto->nombre = $request-> nombre;
        $texto->enlace = $request->enlace;
        $texto->correlacion = $request->correlacion;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto =  chatResponse::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
