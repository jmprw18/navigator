@extends('layout')

@section('title', 'Formulario de Proyecto')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Proyecto</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Formulario de Proyecto</h1>

        @csrf

        <!-- Sección: Responsable del Proyecto -->
        <section>
            <h2>Caratula de estimación</h2>
                <tr>
                    <td><label for="descripcion_obra">Descripción de la Obra o Servicio:</label></td>
                    <td><textarea id="descripcion_obra" name="descripcion_obra" rows="3" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="fecha">Fecha:</label></td>
                    <td><input type="date" id="fecha" name="fecha" required></td>
                </tr>
            </table>
        </section>

        <!-- Sección: Contrato -->
        <section>
            <h2>Contrato</h2>
            <table>
                <tr>
                    <td><label for="numero_contrato">Número de Contrato:</label></td>
                    <td><input type="text" id="numero_contrato" name="numero_contrato" required></td>
                </tr>
                <tr>
                    <td><label for="fecha_contrato">Fecha de Contrato:</label></td>
                    <td><input type="date" id="fecha_contrato" name="fecha_contrato" required></td>
                </tr>
            </table>
        </section>

        <!-- Sección: Contratista -->
        <section>
            <h2>Contratista</h2>
            <table>
                <tr>
                    <td><label for="razon_social">Razón Social:</label></td>
                    <td><input type="text" id="razon_social" name="razon_social" required></td>
                </tr>
                <tr>
                    <td><label for="rfc">RFC:</label></td>
                    <td><input type="text" id="rfc" name="rfc" required></td>
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
                    <td><label for="numero_estimacion">Importes sin incluir I.V.A</label></td>
                    <td><label for="numero_estimacion">Importe</label></td>
                    <td><label for="numero_estimacion">Porcentaje</label></td>
                </tr>
                <tr>
                    <td><label for="numero_estimacion">Importe del contrato:</label></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>
                <tr>
                    <td><label for="periodo_estimacion">Importe estimado acumulado anterior:</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>

                <tr>
                    <td><label for="periodo_estimacion">Importe de la estimación actual:</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>

                <tr>
                    <td><label for="periodo_estimacion">Importe estimado acumulado actual:</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>

                <tr>
                    <td><label for="periodo_estimacion">Saldo por estimar</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>
            </table>

         <h2>Importes del anticipo</h2>
            <table>
                <tr>
                    <td><label for="numero_estimacion">Importes del anticipo</label></td>
                    <td><label for="numero_estimacion">Importe</label></td>
                    <td><label for="numero_estimacion">Porcentaje</label></td>
                </tr>
                <tr>
                    <td><label for="numero_estimacion">Importe del anticipo:</label></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>
                <tr>
                    <td><label for="periodo_estimacion">Importe amortizado acumulado anterior:</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>

                <tr>
                    <td><label for="periodo_estimacion">Importe de la amortización actual:</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>

                <tr>
                    <td><label for="periodo_estimacion">Importe amortizado acumulado actual:</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>

                <tr>
                    <td><label for="periodo_estimacion">Saldo por amortizar</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>
            </table>

            <h2>Importe del neto a recibir</h2>
            <table>
                <tr>
                    <td><label for="numero_estimacion">Importes del neto a recibir</label></td>
                    <td><label for="numero_estimacion">Importe</label></td>
                 </tr>
                <tr>
                    <td><label for="numero_estimacion">Importe de la estimación:</label></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>
                <tr>
                    <td><label for="periodo_estimacion">Amortización del anticipo:</label></td>
                    <td><input type="text" id="numero_estimacion" name="numero_estimacion" required></td>
                </tr>

                <tr>
                    <td><label for="periodo_estimacion">Subtotal:</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                    </tr>

                <tr>
                    <td><label for="periodo_estimacion">16% I.V.A:</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                    </tr>

                <tr>
                    <td><label for="periodo_estimacion">Retención del 0.5% de la S.F.P</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                 </tr>

                 <tr>
                    <td><label for="periodo_estimacion">Retención por atraso de programa</label></td>
                    <td><input type="text" id="periodo_estimacion" name="periodo_estimacion" required></td>
                 </tr>
            </table>
        </section>

      

        <!-- Botón de enviar el formulario -->
        <button type="submit">Guardar Proyecto</button>
    </form>

</body>
</html>

@endsection
