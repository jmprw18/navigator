<?php

namespace App\Http\Controllers\Catalogo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogo;

class CatalogoController extends Controller{
    public function index(){
        $catalogo = Catalogo::all();
        return view('catalogo.catalogo', compact('catalogo'));
    }

    public function store(Request $request){
        Catalogo::create($request->all());
        $response['success'] = true;
        return $response;
    }

    public function updateform(Request $request, $id){
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

    public function destroy($id){
        $catalogo = Catalogo::find($id);
        if ($catalogo) {
            $catalogo->delete();
            return $response['success'] = true;
        } else {
            return $response['success'] = false;
        }
    }
}