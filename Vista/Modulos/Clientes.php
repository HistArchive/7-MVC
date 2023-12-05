<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCliente">
  Registrar
</button>
<script>
  $('#example2 tbody').on('click','btnEdit', function(){
    var datosss = $(this).closest('tr').find('td');
    console.log(datosss);
    //var clave = $(this).row('Id_Cliente');
  });

  $("#btnEdit").click(function(){
        var Id_Cliente = $(this).atrr("idCliente");
        console.log("id" + Id_Cliente);

        var datos = new FormData();
        datos.append("idCliente", idCliente);

        $.ajax({
          url:"ajax/clientes.php",
          method:"POST",
          data: datos,
          cache: false,
          proccessData: false,
          dataType: "Json",
          success: function(respuesta){
            console.log("respuesta", respuesta);
            console.log("hi");
            console.log(datossss);


          }
        })

  })

</script>
<div class="card-body">
<table id="example2" class="table table-bordered table-hover">
  <?php

echo "
<thead>
<tr>
    <th>Id_Cliente</th>
    <th>Nombre</th>
    <th>Ap. Paterno</th>
    <th>Ap. Materno</th>
    <th>Acciones</th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>Trident</td>
    <td>Internet
      Explorer 4.0
    </td>
    <td>Win 95+</td>
    <td> 4</td>
    <td>"
    ?> 
      <button type="button" class="btn btn-primary btnEdit" data-toggle="modal" data-target="#editarModalCliente">Modificar</button>
      <button type="button" class="btn btn-primary" >Eliminar</button>
    </td>
  </tr>
  <tr>
    <td>Trident</td>
    <td>Internet
      Explorer 5.0
    </td>
    <td>Win 95+</td>
    <td>5</td>
    <td> <button type="button" class="btn btn-primary btnEdit" data-toggle="modal" data-target="#editarModalCliente">Modificar</button>
  <button type="button" class="btn btn-primary">Eliminar</button></td>
  </tr>
  <tr>
    <td>Trident</td>
    <td>Internet
      Explorer 5.5
    </td>
    <td>Win 95+</td>
    <td>5.5</td>
    <td> <button type="button" class="btn btn-primary btnEdit" data-toggle="modal" data-target="#editarModalCliente">Modificar</button>
  <button type="button" class="btn btn-primary">Eliminar</button></td>
  </tr>
  <tr>
    <td>Trident</td>
    <td>Internet
      Explorer 6
    </td>
    <td>Win 98+</td>
    <td>6</td>
    <td> <button type="button" class="btn btn-primary btnEdit" data-toggle="modal" data-target="#editarModalCliente">Modificar</button>
  <button type="button" class="btn btn-primary">Eliminar</button></td>
  </tr>
  <tr>
</table>
                 
<div class="modal fade" id="modalCliente">
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
              <span class="input-group-text"><i class="fas fa-user"></i></span><input type="text" class="form-control" data-inputmask-alias="datetime" name="txt_nombre" data-inputmask-inputformat="dd/mm/yyyy" data-mask> 
              </div>
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span> 
              <input type="text" class="form-control" data-inputmask-alias="datetime" name="txt_appa" data-inputmask-inputformat="dd/mm/yyyy" data-mask>   
              </div>
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span> 
                <input type="text" class="form-control" data-inputmask-alias="datetime" name="txt_apma" data-inputmask-inputformat="dd/mm/yyyy" data-mask>  
              </div>
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" data-inputmask-alias="datetime" name="txt_tel" data-inputmask-inputformat="dd/mm/yyyy" data-mask>  
              </div>
            </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>

    <?php
    $obj_GuardarCliente = new ControladorClientes();
      $obj_GuardarCliente -> ctrlGuardarCliente();
      //foto que tome de foreach
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
        <span class="input-group-text"><i class="fas fa-user"></i></span><input type="text" class="form-control" data-inputmask-alias="datetime" name="txt_nombre" data-inputmask-inputformat="dd/mm/yyyy" data-mask> 
        </div>
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user"></i></span> 
        <input type="text" class="form-control" data-inputmask-alias="datetime" name="txt_appa" data-inputmask-inputformat="dd/mm/yyyy" data-mask>   
        </div>
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span> 
          <input type="text" class="form-control" data-inputmask-alias="datetime" name="txt_apma" data-inputmask-inputformat="dd/mm/yyyy" data-mask>  
        </div>
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
          <input type="text" class="form-control" data-inputmask-alias="datetime" name="txt_tel" data-inputmask-inputformat="dd/mm/yyyy" data-mask>  
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