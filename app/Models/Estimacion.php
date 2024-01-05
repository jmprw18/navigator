<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimacion extends Model{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'estimacion';

    protected $fillable = [
        'descripcion',
        'fecha',
        'numero_contrato',
        'fecha_contrato',
        'razon_social',
        'rfc',
        'numero_estimacion',
        'periodo_estimacion',
        'importe_sin_iva',
        'importe_del_contrato',
        'importe_estimado_acumulado_anterior',
        'importe_de_la_estimacion_actual',
        'importe_estimado_acumulado_actual',
        'saldo_por_estimar',
        'importe_del_anticipo',
        'importe_amortizado_acumulado_anterior',
        'importe_de_la_amortizacion_actual',
        'importe_amortizado_acumulado_actual',
        'saldo_por_amortizar',
        'importe_del_neto_a_recibir',
        'importe_de_la_estimacion',
        'amortizacion_del_anticipo',
        'subtotal',
        'iva',
        'retencion_sfp',
        'retencion_por_atraso_de_programa',
        'porcentaje_importe_sin_iva',
        'porcentaje_importe_del_contrato',
        'porcentaje_importe_estimado_acumulado_anterior',
        'porcentaje_importe_de_la_estimacion_actual',
        'porcentaje_importe_estimado_acumulado_actual',
        'porcentaje_saldo_por_estimar',
        'porcentaje_importe_del_anticipo',
        'porcentaje_importe_amortizado_acumulado_anterior',
        'porcentaje_importe_de_la_amortizacion_actual',
        'porcentaje_importe_amortizado_acumulado_actual',
        'porcentaje_saldo_por_amortizar',
        'valido',
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];
}