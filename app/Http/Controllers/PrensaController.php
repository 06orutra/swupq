<?php

namespace App\Http\Controllers;

use App\Models\prensa;
use Illuminate\Http\Request;
use App\Models\Seccion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
/* sigue cambiando*/ 
class PrensaController extends Controller
{
    public function index()
    {
        $prensas = Prensa::with('seccion')->get();
        return response()->json($prensas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Asumiendo que manejas la carga de archivos
            'id_seccion' => 'required|integer'
        ]);

        // Crear un nuevo registro de Prensa
        $prensa = new Prensa;
        $prensa->titulo = $request->titulo;
        $prensa->contenido = $request->contenido;
        $prensa->id_seccion = $request->id_seccion;

        if ($request->hasFile('imagen')) {
            $prensa->imagen = $request->file('imagen')->store('prensa', 'public');
        }

        $prensa->save();
        return response()->json('Prensa creada con éxito');
    }

    public function show($id)
    {
        $prensa = Prensa::findOrFail($id);
        return response()->json($prensa);
    }

    public function update(Request $request, $id)
    {
        $prensa = Prensa::findOrFail($id);
        $prensa->update($request->all());
        return response()->json('Prensa actualizada con éxito');
    }

    public function destroy($id)
    {
        Prensa::destroy($id);
        return response()->json('Prensa eliminada con éxito');
    }
}
