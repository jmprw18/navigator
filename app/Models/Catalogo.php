<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['proyecto', 'clave', 'descripcion', 'unidad', 'cantidad', 'precio_unitario', 'importe', 'fecha_inicio', 'fecha_fin', 'tipo'];
}
