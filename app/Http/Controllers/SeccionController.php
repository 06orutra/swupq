<?php

namespace App\Http\Controllers;

use App\Models\seccion;
use Illuminate\Http\Request;
/* tambien esta cambiando*/
class SeccionController extends Controller
{
    public function index()
    {
        $secciones = Seccion::all();
        return response()->json($secciones);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        $seccion = new Seccion;
        $seccion->nombre = $request->nombre;
        $seccion->save();

        return response()->json('Sección added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255'
        ]);

        $seccion = Seccion::findOrFail($id);
        $seccion->nombre = $request->nombre;
        $seccion->save();

        return response()->json('Sección updated successfully');
    }

    public function destroy($id)
    {
        $seccion = Seccion::findOrFail($id);
        $seccion->delete();

        return response()->json('Sección deleted successfully');
    }
}
