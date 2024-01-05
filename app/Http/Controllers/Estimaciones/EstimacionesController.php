<?php

namespace App\Http\Controllers\Estimaciones;
use App\Http\Controllers\Controller;
use App\Models\Estimacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EstimacionesController extends Controller
{
    public function estimaciones(){
        $proy = Auth::user()->proyecto;
        $contrato = DB::select("SELECT * FROM contrato WHERE (proyecto = '$proy')");
        $proyecto = DB::select("SELECT * FROM proyecto WHERE (id = '$proy')");        
        $des = $proyecto[0]->descripcion;
        //dd($des);
        return view('estimaciones.estimaciones', compact('contrato', 'des'));
    }

    public function store(Request $request){
        //dd($request);
        Estimacion::create($request->all());
        $response['success'] = true;
        return $response;
    }

    public function reportes(){
        $a = 1;
        $b = null;
        $porvalidar = Estimacion::where('valido', $b)->get();
        $validos= Estimacion::where('valido', $a)->get();
        return view('estimaciones.reportes', compact('validos', 'porvalidar'));
    }

    public function valida(Request $request, $id){
        $accion = $request->input('accion');
        if ($accion === 'validar') {
            Estimacion::where('id', $id)->update(['valido' => 1]);
        } elseif ($accion === 'rechazar') {
            Estimacion::where('id', $id)->update(['valido' => 0]);
        }

        $response['success'] = true;
        return $response;
    }
}