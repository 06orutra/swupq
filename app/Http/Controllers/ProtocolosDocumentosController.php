<?php

namespace App\Http\Controllers;

use App\Models\ProtocolosDocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProtocolosDocumentosController extends Controller
{
    public function bannerData()
    {
        $datosBanner = ProtocolosDocumentos::all();
        return response()->json($datosBanner);
    }

    public function registrarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'pdf' => 'required|mimes:pdf|max:1000000',
        ]);

        $pdfName = time() . '_' . $request->file('pdf')->getClientOriginalName();
        $pdfPath = $request->file('pdf')->storeAs('public/pdfs', $pdfName);

        $banner = new ProtocolosDocumentos();
        $banner->nombre = $request->nombre;
        $banner->pdf = $pdfName;
        $banner->save();

        return response()->json('Banner registrado exitosamente');
    }

    public function editarBanner(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'pdf' => 'mimes:pdf|max:1000000',
        ]);

        $banner = ProtocolosDocumentos::find($request->id);

        if ($request->hasFile('pdf')) {
            $pdfName = time() . '_' . $request->file('pdf')->getClientOriginalName();
            $pdfPath = $request->file('pdf')->storeAs('public/pdfs', $pdfName);

            if ($banner->pdf) {
                Storage::delete('public/pdfs/' . $banner->pdf);
            }

            $banner->pdf = $pdfName;
        }

        $banner->nombre = $request->nombre;
        $banner->save();
        return response()->json('Banner editado exitosamente');
    }

    public function eliminarBanner(Request $request)
    {
        $banner = ProtocolosDocumentos::find($request->id);

        if ($banner) {
            if ($banner->pdf) {
                Storage::delete('public/pdfs/' . $banner->pdf);
            }

            $banner->delete();
            return response()->json('Banner eliminado exitosamente');
        } else {
            return response()->json('Banner no encontrado', 404);
        }
    }
}