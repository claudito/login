<?php 

include'../../../autoload.php';
include'../../../session.php';
$numero  = $_GET['codigo'];

$requisc =  new Requisc();

?>


<?php if (count($requisc->consulta($numero,'numero','RQ'))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">REQUERIMIENTO DE COMPRA</h3>
	</div>
	<div class="panel-body">

		<div class="table-responsive">
			<table id="consulta" class="table table-bordered table-condensed">
				<thead>
					<tr class="info">
						<th>NÚMERO</th>
						<th>USUARIO</th>
						<th>FECHA DE INICIO</th>
						<th>FECHA DE FIN</th>
						<th>COMENTARIO</th>
						<th>CENTRO DE COSTO</th>
						<th>ORDEN DE TRABAJO</th>
						<th>ÁREA</th>
						<th>ESTADO</th>
						<th>PRIORIDAD</th>
					</tr>
				</thead>
				<tbody>
				<tr>
				<td><?php echo $requisc->consulta($numero,'numero','RQ'); ?></td>
				<td><?php echo $requisc->consulta($numero,'usuario','RQ'); ?></td>
				<td><?php echo date_format(date_create($requisc->consulta($numero,'fecha_inicio','RQ')),'d/m/Y'); ?></td>
				<td><?php echo date_format(date_create($requisc->consulta($numero,'fecha_fin','RQ')),'d/m/Y'); ?></td>
				<td><?php echo $requisc->consulta($numero,'comentario','RQ'); ?></td>
				<td><?php echo $requisc->consulta($numero,'centro_costo','RQ'); ?></td>
				<td><?php echo $requisc->consulta($numero,'codigo_ot','RQ'); ?></td>
				<td><?php echo $requisc->consulta($numero,'area','RQ'); ?></td>
				<td><?php if ($requisc->consulta($numero,'estado','RQ')=='P') {
					echo "PENDIENTE";
				} else {
					echo "ATENDIDO";
				}
				; ?></td>
				<td>
				<?php 
                switch ($requisc->consulta($numero,'prioridad','RQ')) {
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
                	echo "-";
                		break;
                }

				 ?>
				</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php else: ?>
 <p class="alert alert-warning">No Hay registros Disponibles.</p>
<?php endif ?>

 