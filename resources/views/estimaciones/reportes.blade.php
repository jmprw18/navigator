@extends('layout')

@section('title', 'Página de Inicio')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Estimaciones</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

</script>

<script type="text/javascript">

    function validarRegistro(id) {
        enviarPeticion(id, 'validar');
    }
    
    function rechazarRegistro(id) {
        enviarPeticion(id, 'rechazar');
    }
    
    function enviarPeticion(id, accion) {
        $.ajax({
            type: 'POST',
            url: '/estimaciones/reportes/' + id,
            data: {
                accion: accion,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
¿                console.log(response);
                location.reload();

            },
            error: function(error) {
                console.error(error);
                location.reload();
            }
        });
    }
    
    </script>
    

</head>
<body>
    <h1>Reportes de estimaciones</h1>

    <div style="overflow-x:auto;">
        <h2>Reportes por validar</h2>
        <table>
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Numero de contrato</th>
                    <th>Fecha de contrato</th>
                    <th>Razon social</th>
                    <th>RFC</th>
                    <th>Numero de estimacion</th>
                    <th>Periodo de estimacion</th>
                    <th>Importe sin iva</th>
                    <th>Importe del contrato</th>
                    <th>Importe estimado acumulado anterior</th>
                    <th>Importe de la estimacion actual</th>
                    <th>Importe estimado acumulado actual</th>
                    <th>Saldo por_estimar</th>
                    <th>Importes del anticipo</th>
                    <th>Importe amortizado acumulado anterior</th>
                    <th>Importe de la amortizacion actual</th>
                    <th>Importe amortizado acumulado actual</th>
                    <th>Saldo por amortizar</th>
                    <th>Importes del neto a recibir</th>
                    <th>Importe de la estimacion</th>
                    <th>Amortizacion del anticipo</th>
                    <th>Subtotal</th>
                    <th>IVA</th>
                    <th>Retencion SFP</th>
                    <th>Retencion por atraso de programa</th>
                    <th>Porcentaje importe sin iva</th>
                    <th>Porcentaje importe del contrato</th>
                    <th>Porcentaje importe estimado acumulado anterior</th>
                    <th>Porcentaje importe de la estimacion actual</th>
                    <th>Porcentaje importe estimado acumuladoactual</th>
                    <th>Porcentaje saldo por estimar</th>
                    <th>Porcentaje importe del anticipo</th>
                    <th>Porcentaje importe amortizado acumulado anterior</th>
                    <th>Porcentaje impporte de la amortizacion actual</th>
                    <th>Porcentaje importe amortizado acumulado actual</th>
                    <th>Porcentaje saldo por amortizar</th>
                    <th>Valido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($porvalidar as $dato)
                    <tr>
                        <td>{{ $dato['descripcion'] }}</td>
                        <td>{{ $dato['fecha'] }}</td>
                        <td>{{ $dato['numero_contrato'] }}</td>
                        <td>{{ $dato['fecha_contrato'] }}</td>
                        <td>{{ $dato['razon_social'] }}</td>
                        <td>{{ $dato['rfc'] }}</td>
                        <td>{{ $dato['numero_estimacion'] }}</td>
                        <td>{{ $dato['periodo_estimacion'] }}</td>
                        <td>{{ $dato['importe_sin_iva'] }}</td>
                        <td>{{ $dato['importe_del_contrato'] }}</td>
                        <td>{{ $dato['importe_estimado_acumulado_anterior'] }}</td>
                        <td>{{ $dato['importe_de_la_estimacion_actual'] }}</td>
                        <td>{{ $dato['importe_estimado_acumulado_actual'] }}</td>
                        <td>{{ $dato['saldo_por_estimar'] }}</td>
                        <td>{{ $dato['importe_del_anticipo'] }}</td>
                        <td>{{ $dato['importe_amortizado_acumulado_anterior'] }}</td>
                        <td>{{ $dato['importe_de_la_amortizacion_actual'] }}</td>
                        <td>{{ $dato['importe_amortizado_acumulado_actual'] }}</td>
                        <td>{{ $dato['saldo_por_amortizar'] }}</td>
                        <td>{{ $dato['importe_del_neto_a_recibir'] }}</td>
                        <td>{{ $dato['importe_de_la_estimacion'] }}</td>
                        <td>{{ $dato['amortizacion_del_anticipo'] }}</td>
                        <td>{{ $dato['subtotal'] }}</td>
                        <td>{{ $dato['iva'] }}</td>
                        <td>{{ $dato['retencion_sfp'] }}</td>
                        <td>{{ $dato['retencion_por_atraso_de_programa'] }}</td>
                        <td>{{ $dato['porcentaje_importe_sin_iva'] }}</td>
                        <td>{{ $dato['porcentaje_importe_del_contrato'] }}</td>
                        <td>{{ $dato['porcentaje_importe_estimado_acumulado_anterior'] }}</td>
                        <td>{{ $dato['porcentaje_importe_de_la_estimacion_actual'] }}</td>
                        <td>{{ $dato['porcentaje_importe_estimado_acumulado_actual'] }}</td>
                        <td>{{ $dato['porcentaje_saldo_por_estimar'] }}</td>
                        <td>{{ $dato['porcentaje_importe_del_anticipo'] }}</td>
                        <td>{{ $dato['porcentaje_importe_amortizado_acumulado_anterior'] }}</td>
                        <td>{{ $dato['porcentaje_importe_de_la_amortizacion_actual'] }}</td>
                        <td>{{ $dato['porcentaje_importe_amortizado_acumulado_actual'] }}</td>
                        <td>{{ $dato['porcentaje_saldo_por_amortizar'] }}</td>
                        <td>{{ $dato['valido'] }}</td>
                        <td>
                            <button onclick="validarRegistro({{ $dato['id'] }})">Validar</button>
                            <button onclick="rechazarRegistro({{ $dato['id'] }})">Rechazar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="overflow-x:auto;">
        <h2>Reportes validos</h2>
        <table>
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Numero de contrato</th>
                    <th>Fecha de contrato</th>
                    <th>Razon social</th>
                    <th>RFC</th>
                    <th>Numero de estimacion</th>
                    <th>Periodo de estimacion</th>
                    <th>Importe sin iva</th>
                    <th>Importe del contrato</th>
                    <th>Importe estimado acumulado anterior</th>
                    <th>Importe de la estimacion actual</th>
                    <th>Importe estimado acumulado actual</th>
                    <th>Saldo por_estimar</th>
                    <th>Importes del anticipo</th>
                    <th>Importe amortizado acumulado anterior</th>
                    <th>Importe de la amortizacion actual</th>
                    <th>Importe amortizado acumulado actual</th>
                    <th>Saldo por amortizar</th>
                    <th>Importes del neto a recibir</th>
                    <th>Importe de la estimacion</th>
                    <th>Amortizacion del anticipo</th>
                    <th>Subtotal</th>
                    <th>IVA</th>
                    <th>Retencion SFP</th>
                    <th>Retencion por atraso de programa</th>
                    <th>Porcentaje importe sin iva</th>
                    <th>Porcentaje importe del contrato</th>
                    <th>Porcentaje importe estimado acumulado anterior</th>
                    <th>Porcentaje importe de la estimacion actual</th>
                    <th>Porcentaje importe estimado acumuladoactual</th>
                    <th>Porcentaje saldo por estimar</th>
                    <th>Porcentaje importe del anticipo</th>
                    <th>Porcentaje importe amortizado acumulado anterior</th>
                    <th>Porcentaje impporte de la amortizacion actual</th>
                    <th>Porcentaje importe amortizado acumulado actual</th>
                    <th>Porcentaje saldo por amortizar</th>
                    <th>Valido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($validos as $datos)
                    <tr>
                        <td>{{ $datos['descripcion'] }}</td>
                        <td>{{ $datos['fecha'] }}</td>
                        <td>{{ $datos['numero_contrato'] }}</td>
                        <td>{{ $datos['fecha_contrato'] }}</td>
                        <td>{{ $datos['razon_social'] }}</td>
                        <td>{{ $datos['rfc'] }}</td>
                        <td>{{ $datos['numero_estimacion'] }}</td>
                        <td>{{ $datos['periodo_estimacion'] }}</td>
                        <td>{{ $datos['importe_sin_iva'] }}</td>
                        <td>{{ $datos['importe_del_contrato'] }}</td>
                        <td>{{ $datos['importe_estimado_acumulado_anterior'] }}</td>
                        <td>{{ $datos['importe_de_la_estimacion_actual'] }}</td>
                        <td>{{ $datos['importe_estimado_acumulado_actual'] }}</td>
                        <td>{{ $datos['saldo_por_estimar'] }}</td>
                        <td>{{ $datos['importe_del_anticipo'] }}</td>
                        <td>{{ $datos['importe_amortizado_acumulado_anterior'] }}</td>
                        <td>{{ $datos['importe_de_la_amortizacion_actual'] }}</td>
                        <td>{{ $datos['importe_amortizado_acumulado_actual'] }}</td>
                        <td>{{ $datos['saldo_por_amortizar'] }}</td>
                        <td>{{ $datos['importe_del_neto_a_recibir'] }}</td>
                        <td>{{ $datos['importe_de_la_estimacion'] }}</td>
                        <td>{{ $datos['amortizacion_del_anticipo'] }}</td>
                        <td>{{ $datos['subtotal'] }}</td>
                        <td>{{ $datos['iva'] }}</td>
                        <td>{{ $datos['retencion_sfp'] }}</td>
                        <td>{{ $datos['retencion_por_atraso_de_programa'] }}</td>
                        <td>{{ $datos['porcentaje_importe_sin_iva'] }}</td>
                        <td>{{ $datos['porcentaje_importe_del_contrato'] }}</td>
                        <td>{{ $datos['porcentaje_importe_estimado_acumulado_anterior'] }}</td>
                        <td>{{ $datos['porcentaje_importe_de_la_estimacion_actual'] }}</td>
                        <td>{{ $datos['porcentaje_importe_estimado_acumulado_actual'] }}</td>
                        <td>{{ $datos['porcentaje_saldo_por_estimar'] }}</td>
                        <td>{{ $datos['porcentaje_importe_del_anticipo'] }}</td>
                        <td>{{ $datos['porcentaje_importe_amortizado_acumulado_anterior'] }}</td>
                        <td>{{ $datos['porcentaje_importe_de_la_amortizacion_actual'] }}</td>
                        <td>{{ $datos['porcentaje_importe_amortizado_acumulado_actual'] }}</td>
                        <td>{{ $datos['porcentaje_saldo_por_amortizar'] }}</td>
                        <td>{{ $datos['valido'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection
