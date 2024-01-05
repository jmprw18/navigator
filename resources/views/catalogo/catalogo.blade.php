@extends('layout')

@section('title', 'Página de Inicio')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Catalogo de estimaciones</title>

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

    $(document).ready(function(){
    $('#crear').click(function() {
    console.log("hola");
     var id = 0;
     $('#registroId').val(id);
     $('#formularioCatalogo').trigger('reset');
     $('#crearRegistroModal').modal('show');
     });

   $('.editar').click(function(){
    console.log("hola");
    var id = $(this).data("id");
    console.log(id);
    $.ajax({
      url: '/catalogo/edit/' + id,
      type: 'GET',
      success: function(response) {
        
        $('#proyecto').val(response.catalogo.proyecto);
        $('#clave').val(response.catalogo.clave);
        $('#descripcion').val(response.catalogo.descripcion);
        $('#unidad').val(response.catalogo.unidad);
        $('#cantidad').val(response.catalogo.cantidad);
        $('#precio_unitario').val(response.catalogo.precio_unitario);
        $('#importe').val(response.catalogo.importe);
        $('#fecha_inicio').val(response.catalogo.fecha_inicio);
        $('#fecha_fin').val(response.catalogo.fecha_fin);
        $('#tipo').val(response.catalogo.tipo);
        $('#operacion').val('1');
        $('#registroId').val(id);
        $('#crearRegistroModal').modal('show');
      }
        });
      });


      $('#save').click(function(e){ 
        e.preventDefault();
     var id = $('#registroId').val();
     var formData = $('#formularioCatalogo').serialize();
     console.log(id);
     console.log(formData);
    if (id == 0) {
      $.ajax({
        url: '/catalogo',
        data: formData,
        type: 'POST',
        success: function(response) {
    
        console.log(response);
        location.reload();
        $('#crearRegistroModal').modal('hide');
        }
        });
        
    } else if(id > 0){
        $.ajax({
        url: '/catalogo/update/' + id,
        data: formData,
        type: 'POST',
        success: function(response) {            
        console.log(response);
        location.reload();
        $('#crearRegistroModal').modal('hide');
        }
        });
    }
        return false;
      });

        $('.eliminar').click(function(){
            var id = $(this).data('id');
            console.log(id);
            if (confirm('¿Estás seguro de que quieres eliminar este registro?')) {
                $.ajax({
                    url: '/catalogo/delete/' + id,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    }
                });
            }
        });

});
</script>

</head>
<body>
    <h1>Catalogo de estimaciones</h1>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>PROYECTO</th>
                <th>CLAVE</th>
                <th>DESCRIPCION</th>
                <th>UNIDAD</th>
                <th>CANTIDAD</th>
                <th>PRECIO UNITARIO</th>
                <th>IMPORTE</th>
                <th>INICIO</th>
                <th>FIN</th>
                <th>TIPO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catalogo as $dato)
                <tr {{ $dato->id }}>
                    <td>{{ $dato->proyecto }}</td>
                    <td>{{ $dato->clave }}</td>
                    <td>{{ $dato->descripcion }}</td>
                    <td>{{ $dato->unidad }}</td>
                    <td>{{ $dato->cantidad }}</td>
                    <td>{{ $dato->precio_unitario }}</td>
                    <td>{{ $dato->importe }}</td>
                    <td>{{ $dato->fecha_inicio }}</td>
                    <td>{{ $dato->fecha_fin }}</td>
                    <td>{{ $dato->tipo }}</td>
                    <td>
                    <button id="editar{{$dato->id}}" data-id="{{$dato->id}}" name="editar" type="submit" class="editar btn btn-danger">Editar</button>
                    <button id="eliminar{{$dato->id}}"  data-id="{{$dato->id}}" name="eliminar" type="submit" class="eliminar btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="button" id="crear" class="btn btn-success">Nuevo</button>

    <div class="modal fade" id="crearRegistroModal" tabindex="-1" role="dialog" aria-labelledby="crearRegistroModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearRegistroModalLabel">Crear o Editar Registro</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#" id="formularioCatalogo">
                        @csrf
                    
                        <input type="hidden" name="operacion" id="operacion" value="">
                        <input type="hidden" name="id" id="registroId" value="">

                        <div class="form-group">
                            <label for="proyecto">Proyecto:</label>
                            <input type="text" name="proyecto" id="proyecto" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="clave">Clave:</label>
                            <input type="text" name="clave" id="clave" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="unidad">Unidad:</label>
                            <input type="text" name="unidad" id="unidad" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="cantidad">Cantidad:</label>
                            <input type="text" name="cantidad" id="cantidad" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="precio_unitario">Precio unitario:</label>
                            <input type="text" name="precio_unitario" id="precio_unitario" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="importe">Importe:</label>
                            <input type="text" name="importe" id="importe" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="fecha_inicio">Fecha de Inicio:</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="fecha_fin">Fecha de Fin:</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="tipo">Tipo:</label>
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option value="ordinario">Ordinario</option>
                                <option value="extraordinario">Extraordinario</option>
                            </select>
                        </div>

                        <button type="submit" name="save" id="save" class="btn btn-primary">Guardar Registro</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
