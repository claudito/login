<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Comovc();
$titulo   =  "ORDENES DE SERVICIO";
$folder   =  "ordenes-servicio";

#Insertar a Tabla Firma de Documentos:
foreach ($objeto->lista('OS') as $key => $value) 
{  
	
$aprobacion_documentos =  new Aprobacion_documentos($value['numero'],'OS');
$aprobacion_documentos->agregar();
	
}


 ?>

 <?php if ( count($objeto->lista('OS')) > 0): ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $titulo; ?></h3>
	</div>
	<div class="panel-body">

	<div class="table-responsive">
	<table  id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th>USUARIO</th>
				<th>PROVEEDOR</th>
				<th>FECHA DE INICIO</th>
				<th>FECHA DE FIN</th>
				<th>COMENTARIO</th>
				<th>CENTRO DE COSTO</th>
				<th>ORDEN DE TRABAJO</th>
				<th>ÁREA</th>
				<th>ESTADO</th>
				<th>PRIORIDAD</th>
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($objeto->lista('OS') as $key => $value): ?>
		<tr>
		<td><?php echo $value['numero']; ?></td>
		<td><?php echo $value['usuario']; ?></td>
		<td><?php echo $value['proveedor']; ?></td>
		<td><?php echo date_format(date_create($value['fecha_inicio']),'d/m/Y'); ?></td>
		<td><?php echo date_format(date_create($value['fecha_fin']),'d/m/Y'); ?></td>
		<td><?php echo $value['comentario']; ?></td>
		<td><?php echo $value['centro_costo']; ?></td>
		<td><?php echo $value['codigo_ot']; ?></td>
		<td><?php echo $value['area']; ?></td>
		<td><?php 
		if ($value['estado']==00) 
			{
			echo "EMITIDO";
			}
			elseif ($value['estado']==01) 
			{
			echo "APROBADO";
			}
			elseif ($value['estado']==02) 
			{
			echo "PARCIAL";
			}
			elseif ($value['estado']==03) 
			{
			echo "TOTAL";
			}
			elseif ($value['estado']==04) 
			{
			echo "LIQUIDADO";
			}
			elseif ($value['estado']==05) 
			{
			echo "ANULADO";
			}
		 else {
			echo "ERROR";
		}

		 ?> </td>
		<td><?php  switch ($value['prioridad']) {
			case '1':
				echo "BAJA";
				break;

			case '2':
				echo "MEDIA";
				break;
			
			case '3':
				echo "ALTA";
				break;

			default:
				echo "ERROR";
				break;
		}  ?> </td>
		<td style="text-align: center;">
		<a data-id="<?php echo $value['numero'];?>" id=""  class="btn btn-request btn-xs btn-warning"><i class="glyphicon glyphicon-book"></i></a>
		 <a data-id="<?php echo $value['numero'];?>" id=""  class="btn btn-edit btn-xs btn-info"><i class="glyphicon glyphicon-refresh"></i></a>
		<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
		</td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	
    </div>


	</div>
</div>

<!-- Modal  Visualizar-->
  <script>
  	$(".btn-request").click(function(){
  		id = $(this).data("id");
  		$.get("../vista/modal/<?php echo $folder; ?>/visualizar.php","id="+id,function(data){
  			$("#form-request").html(data);
  		}); 
  		$('#requestModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Requerimientos de Servicio</h4>
        </div>
        <div class="modal-body">

        <div id="form-request"></div>
        
        </div>
        <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Enviar</button>
		</div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Visualizar-->

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

