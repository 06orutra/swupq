<?php

namespace App\Http\Controllers;

use App\Models\Spotypolo;
use Illuminate\Http\Request;

class SpotypoloController extends Controller
{
    public function bannerData(){
        $datosTexto = Spotypolo::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'link' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $texto = new Spotypolo();
        $texto->link = $request->link;
        $texto->save();

        return response()->json('Text registered successfully');
    }

    public function editarBanner(Request $request){
        $request->validate([
            'link' => 'required|string|max:255',
        ]);

        $texto = Spotypolo::find($request->id);

        $texto->link = $request->link;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = Spotypolo::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
