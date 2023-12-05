<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCliente">
  Registrar
</button>
<script>
  $('#tablaClientes tbody').on('click','btnEdit', function(){
    /*var datosss = $(this).closest('tr').find('td');
    console.log(datosss);*/
    //var clave = $(this).row('Id_Cliente');
  });
/*
  Something like this, idk yet since it's ALL JUST A THEORY!
  $("#btnEdit").click(function(){
    var Id_Cliente = $(this).atrr("idCliente");
    console.log("id" + Id_Cliente);

    var datos = new FormData();
    datos.append("idCliente", idCliente);
  });
*/
</script>
<div class="card-body">
<table id="tablaClientes" class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id_Cliente</th>
      <th>Nombre</th>
      <th>Ap. Paterno</th>
      <th>Ap. Materno</th>
      <th>Teléfono</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
    // Capture the echoed JSON data using output buffering
    $ctrl_cliente = dirname(__DIR__) . "/../Controladores/ctrl_cliente.php";
    //echo $ctrl_cliente . " realpath: " . realpath($ctrl_cliente);
    require_once(realpath($ctrl_cliente));

    $json_data = ControladorClientes::obtenerClientes();
    
    // Decode the JSON data into a PHP array
    $decoded_data = json_decode($json_data, true);
    
    // Output data in table rows
    foreach ($decoded_data as $row) {
        echo '<tr>';
        //Repeat as long as the fields are needed
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['Nombre'] . '</td>';
        echo '<td>' . $row['App'] . '</td>';
        echo '<td>' . $row['Apm'] . '</td>';
        echo '<td>' . $row['Telef'] . '</td>';
        echo '<td>';
        echo '<button type="button" class="btn btn-primary btnEdit" data-toggle="modal" data-target="#editarModalCliente">Modificar</button>';
        echo '<button type="button" class="btn btn-primary">Eliminar</button>';
        echo '</td>';
        echo '</tr>';
    }
  ?>
  </tbody>
</table>
                 
<div class="modal fade" id="registrarModalCliente">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" role="form">
      <div class="modal-header">
        <h4 class="modal-title">Registrar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group">
              <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
              <input type="text" class="form-control" name="add_txt_nombre">
              </div>
              <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span> 
              <input type="text" class="form-control" name="add_txt_appa">
              </div>
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span> 
                <input type="text" class="form-control" name="add_txt_apma">
              </div>
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
                <input type="text" class="form-control" name="add_txt_tel">
              </div>
            </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>

    <?php
      $ctrl_cliente = dirname(__DIR__) . "/../Controladores/ctrl_cliente.php";
      require_once(realpath($ctrl_cliente));
      $obj_GuardarCliente = new ControladorClientes();
      $obj_GuardarCliente -> ctrlGuardarCliente();
    ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>

<div class="modal fade" id="editarModalCliente">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" role="form">
      <div class="modal-header">
        <h4 class="modal-title">Editar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text">
          <i class="fas fa-user"></i>
        </span>
        <input type="text" class="form-control" name="edit_txt_nombre">
        </div>
        <div class="input-group-prepend">
        <span class="input-group-text">
          <i class="fas fa-user"></i>
        </span> 
        <input type="text" class="form-control" name="edit_txt_appa">
        </div>
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-user"></i>
          </span> 
          <input type="text" class="form-control" name="edit_txt_apma">
        </div>
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fas fa-user"></i>
          </span>
          <input type="text" class="form-control" name="edit_txt_tel">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  $(document).ready(function () {
    $('#tablaClientes').DataTable();
  });
</script>