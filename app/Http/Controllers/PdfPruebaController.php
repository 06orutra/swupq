<?php

namespace App\Http\Controllers;

use App\Models\pdfPrueba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfPruebaController extends Controller
{
    public function bannerData()
    {
        $datosBanner = PdfPrueba::all();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
            'pdf' => 'required|mimes:pdf|max:1000000',
        ]);

        $banner = new PdfPrueba();
        $banner->nombre = $request->nombre;
        
        // Procesar imagen
        $imagenName = time() . '_' . $request->file('foto')->getClientOriginalName();
        $request->file('foto')->storeAs('public/', $imagenName);
        $banner->imagen = $imagenName;
        
        // Procesar PDF
        $pdfName = time() . '_' . $request->file('pdf')->getClientOriginalName();
        $request->file('pdf')->storeAs('public/pdfs', $pdfName);
        $banner->pdf = $pdfName;

        $banner->save();
        return response()->json('Banner registrado exitosamente');
    }

    public function editarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000000',
            'pdf' => 'mimes:pdf|max:1000000',
        ]);

        $banner = PdfPrueba::find($request->id);
        $banner->nombre = $request->nombre;
        
        // Procesar imagen
        if ($request->hasFile('imagen')) {
            Storage::delete('public/imagenes/' . $banner->imagen);
            $imagenName = time() . '_' . $request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->storeAs('public/', $imagenName);
            $banner->imagen = $imagenName;
        }
        
        // Procesar PDF
        if ($request->hasFile('pdf')) {
            Storage::delete('public/pdfs/' . $banner->pdf);
            $pdfName = time() . '_' . $request->file('pdf')->getClientOriginalName();
            $request->file('pdf')->storeAs('public/pdfs', $pdfName);
            $banner->pdf = $pdfName;
        }

        $banner->save();
        return response()->json('Banner editado exitosamente');
    }

    public function eliminarBanner(Request $request)
    {
        $banner = PdfPrueba::find($request->id);
        
        // Eliminar imagen y PDF
        Storage::delete('public/' . $banner->imagen);
        Storage::delete('public/pdfs/' . $banner->pdf);
        
        $banner->delete();
        return response()->json('Banner eliminado exitosamente');
    }
}
