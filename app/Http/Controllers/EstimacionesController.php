<?php

namespace App\Http\Controllers;

class EstimacionesController extends Controller
{
    public function estimaciones(){
        //$datos = Catalogo::all();
        return view('estimaciones');
    }
}