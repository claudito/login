<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Requerimiento de Compra <?php echo $_GET['id']; ?></title>
<link rel="stylesheet" href="<?php echo PATH; ?>assets/css/estilos-rq.css">

</head>
<body>
<?php 

$requisc  =  new Requisc();
$requisd  =  new Requisd();

 ?>

<div class="imagen-logo">
<img src="../img/logo-pdf.jpg" alt="" width="300">
</div>

<h2 class="center">REQUERIMIENTO DE COMPRA N° <?php echo $_GET['id']; ?></h2>

<table  class="cabecera">
<tr>
<td><strong>SOLICITANTE:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'usuario','RQ'); ?></td>
</tr>
<tr>
<td><strong>FECHA DE INICIO:</strong></td>
<td><?php echo date_format(date_create($requisc->consulta($_GET['id'],'fecha_inicio','RQ')),'d/m/Y') ?></td>
</tr>
<tr>
<td><strong>FECHA DE FIN:</strong></td>
<td><?php echo date_format(date_create($requisc->consulta($_GET['id'],'fecha_fin','RQ')),'d/m/Y') ?></td>
</tr>
<tr>
<td><strong>COMENTARIO:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'comentario','RQ'); ?></td>
</tr>
<tr>
<td><strong>CENTRO DE COSTO:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'centro_costo','RQ'); ?></td>
</tr>
<tr>
<td><strong>ORDEN DE TRABAJO:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'orden_trabajo','RQ'); ?></td>
</tr>
<tr>
<td><strong>ÁREA:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'area','RQ'); ?></td>
</tr>
<tr>
<td><strong>PRIORIDAD:</strong></td>
<td>
<?php 
switch ($requisc->consulta($_GET['id'],'prioridad','RQ')) {
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
	echo "?";
	break;
}

?>
</td>
</tr>

</table>

<table class="detalle">
<thead>
<tr>
<th class="detalle-th center">IT</th>
<th class="detalle-th left">CÓDIGO</th>
<th class="detalle-th left">DESCRIPCIÓN</th>
<th class="detalle-th center">UND</th>
<th class="detalle-th center">CANT</th>
<th class="detalle-th center">SALDO</th>
<th class="detalle-th center">ESTADO</th>
</tr>
</thead>
<tbody>
<?php 
foreach ($requisd->lista($_GET['id'],'RQ') as $key => $value): ?>
<tr>
<td class="detalle-td center"><?php echo $value['item']; ?></td>
<td class="detalle-td left"><?php echo $value['codigo_articulo']; ?></td>
<td class="detalle-td left"><?php echo $value['descripcion_articulo']; ?></td>
<td class="detalle-td center"><?php echo $value['unidad']; ?></td>
<td class="detalle-td center"><?php echo round($value['cantidad'],2); ?></td>
<td class="detalle-td center"><?php echo round($value['saldo'],2); ?></td>
<td class="detalle-td center"><?php echo $value['estado']; ?></td>
</tr>
<?php endforeach ?>
<tr>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
</tr>
</tbody>
</table>

<?php 
$aprobacion_documentos =  new Aprobacion_documentos($_GET['id'],'RQ');
 ?>

<div id="piedepagina">
<table>
<tr class="firmas">
<td class="firmas-td">
<?php if ($aprobacion_documentos->consulta('firma_1')==1): ?>
<img src="../img/firma/firma01.jpg" alt="" width="250">
<?php else: ?>
<img src="../img/firma/firma_vacia.JPG" alt="" width="250">
<?php endif ?>
</td>
<td class="firmas-td">
<?php if ($aprobacion_documentos->consulta('firma_2')==1): ?>
<img src="../img/firma/firma02.jpg" alt="" width="250">
<?php else: ?>
<img src="../img/firma/firma_vacia.JPG" alt="" width="250">
<?php endif ?>
</td>
<td class="firmas-td">
<?php if ($aprobacion_documentos->consulta('firma_3')==1): ?>
<img src="../img/firma/firma03.jpg" alt="" width="250">
<?php else: ?>
<img src="../img/firma/firma_vacia.JPG" alt="" width="250">
<?php endif ?>
</td>
</tr>
<tr class="firmas">
<td class="center">Solicitante</td>
<td class="center">Jefe de Área</td>
<td class="center">Jefe de Compras</td>
</tr>
</table>
</div>
</body>
</html>