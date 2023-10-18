<?php

namespace App\Http\Controllers;

use App\Models\Spotypoli;
use Illuminate\Http\Request;

class SpotypoliController extends Controller
{
    public function bannerData(){
        $datosTexto = Spotypoli::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'link' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $texto = new Spotypoli();
        $texto->link = $request->link;
        $texto->save();

        return response()->json('Text registered successfully');
    }

    public function editarBanner(Request $request){
        $request->validate([
            'link' => 'required|string|max:255',
        ]);

        $texto = Spotypoli::find($request->id);

        $texto->link = $request->link;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = Spotypoli::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
