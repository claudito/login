<?php 
$comovd  =  new Comovd();
$comovc  =  new Comovc();

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Orden de Compra</title>
<link rel="stylesheet" href="<?php echo PATH; ?>assets/css/estilos-oc.css">

</head>
<body>

<div class="imagen-logo">
<img src="../img/logo-pdf.jpg" alt="" width="300">
</div>

<ul>
<li><?php echo EMPRESA; ?></li>
<li><?php echo RUC; ?></li>
<li><?php echo DIRECCION; ?></li>
<li><?php echo TELEFONO; ?></li>
<li><?php echo EMAIL; ?></li>
</ul>

<table class="table-cabecera">
<tr>
<td class="name-documento">N° ORDEN DE COMPRA</td>
<td class="name-documento"><?php echo $_GET['id']; ?></td>
</tr>
</table>

<table class="cabecera">
<tr>
<td class="cabecera-td">PROVEEDOR</td>
<td class="cabecera-td"><?php echo $comovc->consulta($_GET['id'],'proveedor','OC'); ?></td>
<td class="cabecera-td">FECHA EMISIÓN</td>
<td class="cabecera-td"><?php echo date_format(date_create($comovc->consulta($_GET['id'],'fecha_inicio','OC')),'d/m/Y'); ?></td>
</tr>
<tr>
<td class="cabecera-td">RUC</td>
<td class="cabecera-td"><?php echo $comovc->consulta($_GET['id'],'ruc','OC'); ?></td>
<td class="cabecera-td">FECHA DE ENTREGA</td>
<td class="cabecera-td"><?php echo date_format(date_create($comovc->consulta($_GET['id'],'fecha_fin','OC')),'d/m/Y'); ?></td>
</tr>
<tr>
<td class="cabecera-td">TELEFÓNO</td>
<td class="cabecera-td"><?php echo $comovc->consulta($_GET['id'],'telefono','OC'); ?></td>
<td class="cabecera-td">COMPRADOR</td>
<td class="cabecera-td">GUSTAVO MONTERO</td>
</tr>
<tr>
<td class="cabecera-td">CONTACTO</td>
<td class="cabecera-td"><?php echo $comovc->consulta($_GET['id'],'contacto','OC'); ?></td>
<td class="cabecera-td">REQUISCIÓN</td>
<td class="cabecera-td"><?php echo $comovc->consulta($_GET['id'],'requerimiento','OC'); ?></td>
</tr>
<tr>
<td class="cabecera-td">EMAIL</td>
<td class="cabecera-td"><?php echo $comovc->consulta($_GET['id'],'correo','OC'); ?></td>
<td class="cabecera-td">COTIZACIÓN</td>
<td class="cabecera-td">0000001</td>
</tr>
<tr>
<td class="cabecera-td">DIRECCIÓN</td>
<td class="cabecera-td"><?php echo $comovc->consulta($_GET['id'],'direccion1','OC'); ?></td>
<td class="cabecera-td"></td>
<td class="cabecera-td"></td>
</tr>

</table>

<table class="detalle">
<thead>
<tr>
<th class="detalle-th center">IT</th>
<th class="detalle-th left">CÓDIGO</th>
<th class="detalle-th left">DESCRIPCIÓN</th>
<th class="detalle-th center">CANT</th>
<th class="detalle-th center">UND</th>
<th class="detalle-th center">CC</th>
<th class="detalle-th center">OT</th>
<th class="detalle-th center">PU LISTA</th>
<th class="detalle-th center">DSCTO</th>
<th class="detalle-th center">PU NETO</th>
<th class="detalle-th center">TOTAL</th>
</tr>
</thead>
<tbody>
<?php 
$a = 0;
foreach ($comovd->lista($_GET['id'],'OC') as $key => $value): ?>
<tr>
<td class="detalle-td center"><?php echo $value['item']; ?></td>
<td class="detalle-td center"><?php echo $value['codigo']; ?></td>
<td class="detalle-td center"><?php echo $value['descripcion']; ?></td>
<td class="detalle-td center"><?php echo round($value['cantidad'],2); ?></td>
<td class="detalle-td center"><?php echo $value['unidad']; ?></td>
<td class="detalle-td center"><?php echo $value['centro_costo']; ?></td>
<td class="detalle-td center"><?php echo "0"; ?></td>
<td class="detalle-td center"><?php echo "0"; ?></td>
<td class="detalle-td center"><?php echo "0"; ?></td>
<td class="detalle-td center"><?php echo round($value['precio'],2); ?></td>
<td class="detalle-td center"><?php echo $value['cantidad']*$value['precio']; ?></td>
<?php 
  $a = ($value['cantidad']*$value['precio']) + $a;
 ?>
</tr>
<?php endforeach ?>
</tbody>
<tr>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
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

<table class="operacion">
<tr>
<td class="operacion-td">CONDICIONES DE PAGO</td>
<td class="operacion-td left">Contado Contra Entrega trf</td>
<td class="operacion-td right operacion-td-right">SUBTOTAL</td>
<td class="operacion-td right">S/. <?php echo $a-(round($a/IGV,2)); ?></td>
</tr>
<tr>
<td class="operacion-td">LUGAR DE ENTREGA</td>
<td class="operacion-td left"><?php echo DIRECCION; ?></td>
<td class="operacion-td right operacion-td-right">I.G.V<?php echo IGV; ?>%</td>
<td class="operacion-td right">S/. <?php echo round($a/IGV,2); ?></td>
</tr>
<tr>
<td class="operacion-td">MODO DE ENTREGA</td>
<td class="operacion-td left">ENVÍO</td>
<td class="operacion-td right operacion-td-right">VALOR DE VENTA</td>
<td class="operacion-td right">S/. <?php echo $a; ?></td>
</tr>
<tr>
<td class="operacion-td">INFO TRANSFERENCIA</td>
<td class="operacion-td">N° DE CUENTA - ME  191-2172535-1-06</td>
<td class="operacion-td right operacion-td-right">TOTAL</td>
<td class="operacion-td right">S/. <?php echo $a; ?> </td>
</tr>
<tr>
<td class="operacion-td">MONEDA</td>
<td class="operacion-td left">SOLES</td>
<td class="operacion-td right operacion-td-right"></td>
<td class="operacion-td left"></td>
</tr>
<tr>
<td class="operacion-td">OBSERVACIONES</td>
<td class="operacion-td"></td>
<td class="operacion-td operacion-td-right"></td>
<td class="operacion-td"></td>
</tr>
</table>

<p class="mensaje"><?php echo MENSAJE; ?></p>



<?php 
$aprobacion_documentos =  new Aprobacion_documentos($_GET['id'],'OC');
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