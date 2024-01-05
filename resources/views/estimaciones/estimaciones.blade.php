@extends('layout')

@section('title', 'Estimaciones')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estimación</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
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
<script>
    $(document).ready(function () {
        $('#save').click(function(e){ 
            e.preventDefault();
            var formData = $('#formularioEstimacion').clone();
            formData.find('[readonly]').prop('readonly', false);
            $.ajax({
                url: '/estimaciones',
                data: formData.serialize(),
                type: 'POST',
                success: function(response) {
                    console.log(response);
                    location.reload();
                }
            });
            return false;
        });
    });
</script>
</head>
<body>
    <form id="formularioEstimacion">

        <h1>Estimación</h1>

        @csrf

        <!-- Sección: Responsable del Proyecto -->
        <section>
            <h2>Caratula de estimación</h2>
                <tr>
                    <td><label for="descripcion">Descripción de la Obra o Servicio:</label></td>
                    <td><input id="descripcion" name="descripcion" value ="{{$des}}" readonly></td>
                </tr>
                <tr>
                    <td><label for="fecha">Fecha:</label></td>
                    <td><input type="date" id="fecha" name="fecha" value= "<?php echo date("Y-m-d");?>" readonly></td>
                </tr>
            </table>
        </section>

        <!-- Sección: Contrato -->
        <section>
            <h2>Contrato</h2>
            <table>
                <tr>
                    <td><label for="numero_contrato">Número de Contrato:</label></td>
                    <td><input type="text" id="numero_contrato" name="numero_contrato" value ="{{$contrato[0]->folio}}" readonly></td>
                </tr>
                <tr>
                    <td><label for="fecha_contrato">Fecha de Contrato:</label></td>
                    <td><input type="date" id="fecha_contrato" name="fecha_contrato" value ="{{$contrato[0]->inicio}}" readonly></td>
                </tr>
            </table>
        </section>

        <!-- Sección: Contratista -->
        <section>
            <h2>Contratista</h2>
            <table>
                <tr>
                    <td><label for="razon_social">Razón Social:</label></td>
                    <td><input type="text" id="razon_social" name="razon_social" value ="{{$contrato[0]->razon_social}}" readonly></td>
                </tr>
                <tr>
                    <td><label for="rfc">RFC:</label></td>
                    <td><input type="text" id="rfc" name="rfc" value ="{{$contrato[0]->RFC}}" readonly></td>
                </tr>
            </table>
        </section>

        <!-- Sección: Estimación -->
        <section>
            <h2>Estimación</h2>
            <table>
                <tr>
                    <td><label for="numero_estimacion">Número de Estimación:</label></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>
                <tr>
                    <td><label for="periodo_estimacion">Periodo de Estimación:</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                </tr>
            </table>

            <h2>Importes sin incluir I.V.A</h2>
            <table>
                <tr>
                    <td>Importes sin incluir I.V.A</label></td>
                    <td><label>Importe</label></td>
                    <td><label>Porcentaje</label></td>
                </tr>
                <tr>
                    <td><label for="importe_sin_iva">Importe sin IVA:</label></td>
                    <td><input type="text" id="importe_sin_iva" name="importe_sin_iva" required></td>
                    <td><input type="text" id="porcentaje_importe_sin_iva" name="porcentaje_importe_sin_iva" required></td>
                </tr>
                <tr>
                    <td><label for="importe_del_contrato">Importe del contrato:</label></td>
                    <td><input type="text" id="importe_del_contrato" name="importe_del_contrato" required></td>
                    <td><input type="text" id="porcentaje_importe_del_contrato" name="porcentaje_importe_del_contrato" required></td>
                </tr>
                <tr>
                    <td><label for="importe_estimado_acumulado_anterior">Importe estimado acumulado anterior:</label></td>
                    <td><input type="text" id="importe_estimado_acumulado_anterior" name="importe_estimado_acumulado_anterior" required></td>
                    <td><input type="text" id="porcentaje_importe_estimado_acumulado_anterior" name="porcentaje_importe_estimado_acumulado_anterior" required></td>
                </tr>

                <tr>
                    <td><label for="importe_de_la_estimacion_actual">Importe de la estimación actual:</label></td>
                    <td><input type="text" id="importe_de_la_estimacion_actual" name="importe_de_la_estimacion_actual" required></td>
                    <td><input type="text" id="porcentaje_importe_de_la_estimacion_actual" name="porcentaje_importe_de_la_estimacion_actual" required></td>
                </tr>

                <tr>
                    <td><label for="importe_estimado_acumulado_actual">Importe estimado acumulado actual:</label></td>
                    <td><input type="text" id="importe_estimado_acumulado_actual" name="importe_estimado_acumulado_actual" required></td>
                    <td><input type="text" id="porcentaje_importe_estimado_acumulado_actual" name="porcentaje_importe_estimado_acumulado_actual" required></td>
                </tr>

                <tr>
                    <td><label for="saldo_por_estimar">Saldo por estimar:</label></td>
                    <td><input type="text" id="saldo_por_estimar" name="saldo_por_estimar" required></td>
                    <td><input type="text" id="porcentaje_saldo_por_estimar" name="porcentaje_saldo_por_estimar" required></td>
                </tr>
            </table>

         <h2>Importes del anticipo</h2>
            <table>
                <tr>
                    <td><label>Importes del anticipo</label></td>
                    <td><label>Importe</label></td>
                    <td><label>Porcentaje</label></td>
                </tr>
                <tr>
                    <td><label for="importe_del_anticipo">Importe del anticipo:</label></td>
                    <td><input type="text" id="importe_del_anticipo" name="importe_del_anticipo" required></td>
                    <td><input type="text" id="porcentaje_importe_del_anticipo" name="porcentaje_importe_del_anticipo" required></td>
                </tr>
                <tr>
                    <td><label for="importe_amortizado_acumulado_anterior">Importe amortizado acumulado anterior:</label></td>
                    <td><input type="text" id="importe_amortizado_acumulado_anterior" name="importe_amortizado_acumulado_anterior" required></td>
                    <td><input type="text" id="porcentaje_importe_amortizado_acumulado_anterior" name="porcentaje_importe_amortizado_acumulado_anterior" required></td>
                </tr>

                <tr>
                    <td><label for="importe_de_la_amortizacion_actual">Importe de la amortización actual:</label></td>
                    <td><input type="text" id="importe_de_la_amortizacion_actual" name="importe_de_la_amortizacion_actual" required></td>
                    <td><input type="text" id="porcentaje_importe_de_la_amortizacion_actual" name="porcentaje_importe_de_la_amortizacion_actual" required></td>
                </tr>

                <tr>
                    <td><label for="importe_amortizado_acumulado_actual">Importe amortizado acumulado actual:</label></td>
                    <td><input type="text" id="importe_amortizado_acumulado_actual" name="importe_amortizado_acumulado_actual" required></td>
                    <td><input type="text" id="porcentaje_importe_amortizado_acumulado_actual" name="porcentaje_importe_amortizado_acumulado_actual" required></td>
                </tr>

                <tr>
                    <td><label for="saldo_por_amortizar">Saldo por amortizar:</label></td>
                    <td><input type="text" id="saldo_por_amortizar" name="saldo_por_amortizar" required></td>
                    <td><input type="text" id="porcentaje_saldo_por_amortizar" name="porcentaje_saldo_por_amortizar" required></td>
                </tr>
            </table>

            <h2>Importe del neto a recibir</h2>
            <table>
                <tr>
                    <td><label>Importes del neto a recibir</label></td>
                    <td><label>Importe</label></td>
                 </tr>
                 <tr>
                    <td><label for="importe_del_neto_a_recibir">Importe del neto a recibir:</label></td>
                    <td><input type="text" id="importe_del_neto_a_recibir" name="importe_del_neto_a_recibir" required></td>
                </tr>
                <tr>
                    <td><label for="importe_de_la_estimacion">Importe de la estimación:</label></td>
                    <td><input type="text" id="importe_de_la_estimacion" name="importe_de_la_estimacion" required></td>
                </tr>
                <tr>
                    <td><label for="amortizacion_del_anticipo">Amortización del anticipo:</label></td>
                    <td><input type="text" id="amortizacion_del_anticipo" name="amortizacion_del_anticipo" required></td>
                </tr>

                <tr>
                    <td><label for="subtotal">Subtotal:</label></td>
                    <td><input type="text" id="subtotal" name="subtotal" required></td>
                    </tr>

                <tr>
                    <td><label for="iva">16% I.V.A:</label></td>
                    <td><input type="text" id="iva" name="iva" required></td>
                    </tr>

                <tr>
                    <td><label for="retencion_sfp">Retención del 0.5% de la S.F.P</label></td>
                    <td><input type="text" id="retencion_sfp" name="retencion_sfp" required></td>
                 </tr>

                 <tr>
                    <td><label for="retencion_por_atraso_de_programa">Retención por atraso de programa</label></td>
                    <td><input type="text" id="retencion_por_atraso_de_programa" name="retencion_por_atraso_de_programa" required></td>
                 </tr>
            </table>
        </section>

        <button type="submit" id= "save">Guardar estimación</button>
    </form>

</body>
</html>
@endsection
