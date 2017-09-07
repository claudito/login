<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Articulo();
$titulo   =  "ARTÍCULOS";
$folder   =  "articulo";

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
				<th>CÓDIGO</th>
				<th>CÓDIGO 2</th>
				<th>DESCRIPCIÓN</th>
				<th>DESCRIPCIÓN 2</th>
				<th>FICHA</th>
				<th>CÓDIGO DE FAMILIA</th>
				<th>CÓDIGO DE UNIDAD</th>
				<th>CÓDIGO DE TIPO DE ARTÍCULO</th>
				<th>ESTADO</th>
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($objeto->lista() as $key => $value): ?>
		<tr>
		<td><?php echo $value['codigo']; ?>        </td>
		<td><?php echo $value['codigo2']; ?> </td>
		<td><?php echo $value['descripcion']; ?> </td>
		<td><?php echo $value['descripcion2']; ?> </td>
		<td><?php echo $value['ficha']; ?> </td>
		<td><?php echo $value['familia']; ?> </td>
		<td><?php echo $value['unidad']; ?> </td>
		<td><?php echo $value['tipo']; ?> </td>
		<td><?php echo ($value['estado']==1) ? "ACTIVO" : "INACTIVO" ; ?> </td>	
		<td style="text-align: center;">
		 <a data-id="<?php echo $value['id'];?>" id=""  class="btn btn-edit btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i></a>
		 <a data-id="<?php echo $value['id'];?>" id=""  class="btn btn-upload btn-xs btn-primary"><i class="fa fa-upload"></i></a>
		 <button type="button" class="btn btn-view btn btn-success btn-xs" data-toggle="modal" data-target="#dataInfo" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-eye-open"></i></button>
		<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
		</td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
	</script>
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

  <!-- Modal  Upload-->
  <script>
  	$(".btn-upload").click(function(){
  		id = $(this).data("id");
  		$.get("../vista/modal/<?php echo $folder; ?>/subir.php","id="+id,function(data){
  			$("#form-upload").html(data);
  		});
  		$('#uploadModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Archivo</h4>
        </div>
        <div class="modal-body">
        <div id="form-upload"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  subir-->

	<!-- Modal Ver -->
   <script>
  	$(".btn-view").click(function(){
  		id = $(this).data("id");
  		$.get("../vista/modal/<?php echo $folder; ?>/ver.php","id="+id,function(data){
  			$("#form-view").html(data);
  		});
  		$('#viewModal').modal('show');
  	});

  </script>
  <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Archivo</h4>
        </div>
        <div class="modal-body">
        <div id="form-view"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Ver-->

	<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
	</script>
 <?php else: ?>
 <p class="alert alert-warning">No existen Registros.</p>
 <?php endif ?>

