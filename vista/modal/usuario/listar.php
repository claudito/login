<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Usuario();
$titulo   =  "USUARIOS";
$folder   =  "usuario";

 ?>

 <?php if ( count($objeto->lista()) > 0): ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $titulo; ?></h3>
	</div>
	<div class="panel-body">

	<div class="table-responsive">
	<table  id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr>
				<th>ID</th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>CORREO</th>
				<th>CELULAR</th>
				<th>TIPO</th>
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($objeto->lista() as $key => $value): ?>
		<tr>
		<td><?php echo $value['id']; ?>        </td>
		<td><?php echo $value['nombres']; ?> </td>
		<td><?php echo $value['apellidos']; ?> </td>
		<td><?php echo $value['correo']; ?> </td>
		<td><?php echo $value['celular']; ?> </td>
		<td><?php echo ($value['tipo']=='admin') ? "ADMIN" : "USER" ; ?></td>
		<td style="text-align: center;">
      <a data-id="<?php echo $value['id'];?>" id=""  class="btn btn-usuario-tipo btn-sm btn-success"><i class="fa fa-user"></i></a>
		  <a data-id="<?php echo $value['id'];?>" id=""  class="btn btn-permisos btn-sm btn-warning"><i class="glyphicon glyphicon-lock"></i></a>
		 <a data-id="<?php echo $value['id'];?>" id=""  class="btn btn-edit btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
		</td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>

    </div>


	</div>
</div>

  <!-- Modal  Actualizar-->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("../vista/modal/<?php echo $folder; ?>/actualizar.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Actualizar-->


  <!-- Modal  Permisos-->
  <script>
  	$(".btn-permisos").click(function(){
  		id = $(this).data("id");
  		$.get("../vista/modal/<?php echo $folder; ?>/permisos.php","id="+id,function(data){
  			$("#form-permisos").html(data);
  		});
  		$('#permisosModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="permisosModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Permisos SubMenú</h4>
        </div>
        <div class="modal-body">
        <div id="form-permisos"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Permisos-->

<script> //Permisos Tipos de Usuario
    $(".btn-usuario-tipo").click(function(){
      id = $(this).data("id");
      $.get("../vista/modal/<?php echo $folder; ?>/usuario_tipo.php","id="+id,function(data){
        $("#form-usuario-tipo").html(data);
      });
      $('#usuario-tipoModal').modal('show');
    });
  </script>
  <div class="modal fade" id="usuario-tipoModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Permisos Tipo de Usuario <i class="glyphicon glyphicon-user"></i></h4>
        </div>
        <div class="modal-body">
        <div id="form-usuario-tipo"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Permisos-->
  <script>
  $(document).ready(function(){
  $('#consulta').DataTable();
  });
  </script>
 <?php else: ?>
 <p class="alert alert-warning">No existen Registros.</p>
 <?php endif ?>

