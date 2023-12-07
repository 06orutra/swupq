<?php

namespace App\Http\Controllers;

use App\Models\prensa;
use Illuminate\Http\Request;
use App\Models\Seccion;
use Illuminate\Support\Facades\Storage;

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
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nombre_seccion' => 'required|string|max:255'
        ]);

        // Manejar la sección
        $seccion = Seccion::firstOrCreate(['nombre' => $request->nombre_seccion]);

        $prensa = new Prensa;
        $prensa->titulo = $request->titulo;
        $prensa->contenido = $request->contenido;
        $prensa->id_seccion = $seccion->id;

        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            $imageName = $request->file('imagen')->store('prensa', 'public');
            $prensa->imagen = $imageName;
        }

        $prensa->save();
        return response()->json('Prensa added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'string|max:255',
            'contenido' => 'string',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nombre_seccion' => 'string|max:255'
        ]);

        $prensa = Prensa::findOrFail($id);

        // Actualizar sección si es necesario
        if ($request->has('nombre_seccion')) {
            $seccion = Seccion::firstOrCreate(['nombre' => $request->nombre_seccion]);
            $prensa->id_seccion = $seccion->id;
        }

        // Actualizar otros campos
        $prensa->fill($request->only('titulo', 'contenido'));

        // Manejar la actualización de la imagen
        if ($request->hasFile('imagen')) {
            // Eliminar imagen antigua si existe
            if ($prensa->imagen) {
                Storage::delete('public/' . $prensa->imagen);
            }

            $imageName = $request->file('imagen')->store('prensa', 'public');
            $prensa->imagen = $imageName;
        }

        $prensa->save();
        return response()->json('Prensa updated successfully');
    }

    public function destroy($id)
    {
        $prensa = Prensa::findOrFail($id);

        // Eliminar imagen si existe
        if ($prensa->imagen) {
            Storage::delete('public/' . $prensa->imagen);
        }

        $prensa->delete();
        return response()->json('Prensa deleted successfully');
    }
}
