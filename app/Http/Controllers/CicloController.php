<?php
//CicloController.php hace referencia al ciclo escolar en curso
//Es el que en "Modelo Educativo" hace que aparezca
//El texto "Ciclo escolar Enero - Abril 2023"
namespace App\Http\Controllers;

use App\Models\ciclo;
use Illuminate\Http\Request;

class CicloController extends Controller
{
    public function bannerData(){
        $datosTexto = ciclo::all();
        return response()->json($datosTexto);
    }

    public function registrarBanner(Request $request){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string|max:255',
        ]);

        // Create a new banner instance
        $texto = new ciclo();
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

        $texto = ciclo::find($request->id);

        $texto->titulo = $request->titulo;
        $texto->contenido = $request->contenido;
        $texto->save();

        return response()->json('Text edited successfully');
    }


    
    public function eliminarBanner(Request $request){
        $texto = ciclo::find($request->id);
        $texto->delete();

        return response()->json('Banner deleted successfully');
    }
}
