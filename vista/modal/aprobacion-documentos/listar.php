<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Aprobacion_documentos();
$folder   =  "aprobacion-documentos";
$tipo     =   $_SESSION['tipo_documento'];


switch ($tipo) {
	case 'RQ':
	$titulo  = "REQUERMIENTO DE COMPRAS APROBADAS";
	$firma_1 = "SOLICITANTE";
	$firma_2 = "JEFE DE ÁREA";
	$firma_3 = "ENCARGADO DE COMPRAS";
		break;
	case 'RS':
	$titulo = "REQUERMIENTO DE SERVICIOS APROBADAS";
	$firma_1 = "SOLICITANTE";
	$firma_2 = "JEFE DE ÁREA";
	$firma_3 = "ENCARGADO DE COMPRAS";
		break;
	case 'OC':
	$titulo = "ORDENES DE COMPRA APROBADAS";
	$firma_1 = "GERENTE #1";
	$firma_2 = "GERENTE #2";
	$firma_3 = "ENCARGADO DE COMPRAS";
		break;
	case 'OS':
	$titulo = "ORDENES DE SERVICIOS APROBADAS";
	$firma_1 = "GERENTE #1";
	$firma_2 = "GERENTE #2";
	$firma_3 = "ENCARGADO DE COMPRAS";
		break;
	
	default:
	$titulo="";
		break;
}

 ?>

 <?php if (count($objeto->documentos($tipo))>0): ?>
 <div class="panel panel-info">
 	<div class="panel-heading">
 		<h3 class="panel-title"><?php echo $titulo; ?></h3>
 	</div>
 	<div class="panel-body">
 	<div class="table-responsive">
 		<table class="table table-bordered table-condensed" id="consulta">
 			<thead>
 			<tr>
 			<th colspan="2"></th>
 			<th colspan="3" class="success text-center">FIRMAS</th>
 			<th></th>
 			</tr>
 				<tr class="active">
 					<th>N° Documento</th>
 					<th>Solicitante</th>
 					<th class="success text-center"><?php echo $firma_1; ?></th>
 					<th class="success text-center"><?php echo $firma_2; ?></th>
 					<th class="success text-center"><?php echo $firma_3; ?></th>
 					<th class="text-center">Acciones</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php foreach ($objeto->documentos($tipo) as $key => $value): ?>
			<tr>
			<td><?php echo $value['numero']; ?></td>
			<td><?php echo $value['usuario']; ?></td>
			<td style="text-align: center;">
			<?php if ($value['firma_1']==0): ?>
			<button class="btn btn-xs btn-danger"><i class="fa fa-check-circle-o"></i></button>
			<?php else: ?>
			<button class="btn btn-xs btn-success"><i class="fa fa-check-circle-o"></i></button>	
			<?php endif ?>
			</td>
			<td style="text-align: center;">
			<?php if ($value['firma_2']==0): ?>
			<button class="btn btn-xs btn-danger"><i class="fa fa-check-circle-o"></i></button>
			<?php else: ?>
			<button class="btn btn-xs btn-success"><i class="fa fa-check-circle-o"></i></button>	
			<?php endif ?>
			</td>
			<td style="text-align: center;">
			<?php if ($value['firma_3']==0): ?>
			<button class="btn btn-xs btn-danger"><i class="fa fa-check-circle-o"></i></button>
			<?php else: ?>
			<button class="btn btn-xs btn-success"><i class="fa fa-check-circle-o"></i></button>	
			<?php endif ?>
			</td>
			<td style="text-align: center;">
			<button class="btn btn-default btn-sm btn-firmar" data-numero="<?php echo $value['numero']; ?>" data-tipo="<?php echo $value['tipo']; ?>"><i class="fa fa-pencil"></i></button>
			</td>
			</tr>
 			<?php endforeach ?>
 			</tbody>
 		</table>
 	</div>
 	</div>
 </div>

<!-- Script Modal Firmar -->
<script>
  	$(".btn-firmar").click(function(){
  		numero = $(this).data("numero");
  		tipo   = $(this).data("tipo");
  		$.get("../vista/modal/<?php echo $folder; ?>/firmar.php","numero="+numero+"&tipo="+tipo,function(data){
  			$("#form-firmar").html(data);
  		});
  		$('#modal-firmar').modal('show');
  	});
  </script>

<!-- Modal Firmar -->
<div class="modal fade" id="modal-firmar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div id="form-firmar"></div>
</div>
</div>
</div>

 <script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
</script>
 <?php else: ?>
 <p class="alert alert-warning">No Hay Documentos Disponibles.</p>
 <?php endif ?>

