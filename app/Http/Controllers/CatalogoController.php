<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;

class CatalogoController extends Controller
{
    public function index()
    {
        $catalogo = Catalogo::all();
        return view('catalogo.catalogo', compact('catalogo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyecto' => 'required|string',
            'clave' => 'required|string',
            'descripcion' => 'required|string',
            'unidad' => 'required|string',
            'cantidad' => 'required|string',
            'precio_unitario' => 'required|string',
            'importe' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'tipo' => 'required|in:ordinario,extraordinario',
        ]);

        Catalogo::create($request->all());

        $response['success'] = true;

        return $response;
    }

    public function updateform(Request $request, $id)
    {
        $catalogo = Catalogo::find($id);

        if ($catalogo) {
            return response()->json([
                'success' => true,
                'catalogo' => $catalogo
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hubo un error al recibir la apuesta.'
            ]);
        }
    }

    public function update(Request $request, $id){
        
        $catalogo = Catalogo::find($id);

        if ($catalogo) {
            $catalogo->update($request->all());
            return $response['success'] = true;
        } else {
            return $response['success'] = false;
        }
    }

    public function destroy($id)
    {
        $catalogo = Catalogo::find($id);

        if ($catalogo) {
            $catalogo->delete();
            return $response['success'] = true;
        } else {
            // Puedes personalizar el mensaje de error según tu lógica de negocio.
            return $response['success'] = false;
        }
    }
}