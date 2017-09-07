<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Orden_trabajo();
$titulo   =  "ORDEN DE TRABAJO";
$folder   =  "orden-trabajo";

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
				<th>CLIENTE</th>
				<th>UNIDAD</th>
				<th>DESCRIPCIÓN</th>
				<th>FECHA DE INICIO</th>
				<th>FECHA DE FIN</th>
				<th>CANTIDAD</th>
				<th>OBSERVACIÓN</th>
				<th>ESTADO</th>
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($objeto->lista() as $key => $value): ?>
		<tr>
		<td><?php echo $value['codigo']; ?></td>
		<td><?php echo $value['cliente']; ?> </td>
		<td><?php echo $value['unidad']; ?> </td>
		<td><?php echo $value['descripcion']; ?> </td>
		<td><?php echo date_format(date_create($value['fecha_inicio']),'d/m/Y'); ?> </td>
		<td><?php echo date_format(date_create($value['fecha_fin']),'d/m/Y'); ?> </td>
		<td><?php echo round($value['cantidad'],2); ?> </td>
		<td><?php echo $value['observacion']; ?> </td>
		<td><?php echo ($value['estado']=='ACTIVO') ? "ACTIVO" : "LIQUIDADO" ; ?> </td>
		<td style="text-align: center;">
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

<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
</script>
 <?php else: ?>
 <p class="alert alert-warning">No existen Registros.</p>
 <?php endif ?>

