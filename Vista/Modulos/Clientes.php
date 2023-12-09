<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrarModalCliente">
  Registrar
</button>
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
    require_once(realpath($ctrl_cliente));
    
    // Decode the JSON data into a PHP array
    $data = json_decode(ControladorClientes::obtenerClientes(), true);
    if (isset($data['error']) || $data == NULL){
      echo '<div style="width: 100%;
      margin: 0 auto; 
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      color: #721c24;
      border-radius: 5px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">';
      echo isset($data) ? htmlspecialchars($data['error']) : "Internal Server Error";
      echo '</div>';   
    } else {
      // Output data in table rows
      foreach ($data as $row) {
        if (isset($row['err'])) {
          break;
        }
        echo '<tr>';
        //Repeat as long as the fields are needed
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['Nombre'] . '</td>';
        echo '<td>' . $row['App'] . '</td>';
        echo '<td>' . $row['Apm'] . '</td>';
        echo '<td>' . $row['Telef'] . '</td>';
        echo '<td>';
        echo '<button type="button" class="btn btn-primary btnEdit" data-toggle="modal" data-target="#editarModalCliente">Modificar</button>';
        echo '<button type="button" class="btn btn-primary btnDelete">Eliminar</button>';
        echo '</td>';
        echo '</tr>';
      }
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
              <input type="text" class="form-control" name="add_txt_app">
              </div>
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span> 
                <input type="text" class="form-control" name="add_txt_apm">
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
      $obj_GuardarCliente -> guardarCliente();
      $obj_GuardarCliente -> actualizarCliente();
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
              <input type="hidden" name="edit_id" id="edit_id">
              <input type="text" class="form-control" name="edit_txt_nombre" id="edit_txt_nombre">
            </div>
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span> 
              <input type="text" class="form-control" name="edit_txt_app" id="edit_txt_app">
            </div>
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span> 
              <input type="text" class="form-control" name="edit_txt_apm" id="edit_txt_apm">
            </div>
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
              <input type="text" class="form-control" name="edit_txt_tel" id="edit_txt_tel">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
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
    // Handle click event on "Eliminar" buttons
    $('.btnDelete').on('click', function () {
      // Find the closest table row (tr)
      var row = $(this).closest('tr');

      // Find the value in the "Id_Cliente" column
      var idCliente = row.find('td:eq(0)').text(); // "Id_Cliente" is in the first column (index 0)

      // Call your function with the obtained idCliente
      eliminarCliente(idCliente);
    });

    function eliminarCliente(idCliente) {
      // You can now use the idCliente as needed
      var deleteing = confirm("Are you sure you want to delete the user with the ID: " + idCliente + "?");
      if (!deleteing) {return;}
      console.log('Deleting client with id: ' + idCliente);
      $.ajax({
            url: 'Controladores/ajax/ctrl_cliente.php',
            type: 'POST',
            dataType: 'json',
            data: {idClient: idCliente}, // Include the data to be sent
            success: function (data) {
                // Handle the successful response
                alert(data.message);
                if (data.status != "error"){window.location="Clientes";}
            },
            error: function (error) {
                // Handle the error
                alert('An error has ocurred, please wait a few minutes and try again.');
                console.error('Error deleting client:', error.statusText);
            }
        });
    }
  });

  $('.btnEdit').on('click', function () {
    var row = $(this).closest('tr');
    // Extract data from the row
    var id = row.find('td:eq(0)').text();  // Assuming id is in the first column
    var nombre = row.find('td:eq(1)').text();
    var app = row.find('td:eq(2)').text();
    var apm = row.find('td:eq(3)').text();
    var tel = row.find('td:eq(4)').text();
    
    // Fill the form
    $('#editarModalCliente #edit_id').val(id);
    $('#editarModalCliente #edit_txt_nombre').val(nombre);
    $('#editarModalCliente #edit_txt_app').val(app);
    $('#editarModalCliente #edit_txt_apm').val(apm);
    $('#editarModalCliente #edit_txt_tel').val(tel);
  });

</script>