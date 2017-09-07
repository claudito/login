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
<td class="name-documento">0005213</td>
</tr>
</table>

<table class="cabecera">
<tr>
<td class="cabecera-td">PROVEEDOR</td>
<td class="cabecera-td">PERÚTEC ENTERPRISES SAC</td>
<td class="cabecera-td">FECHA EMISIÓN</td>
<td class="cabecera-td">31/08/2017</td>
</tr>
<tr>
<td class="cabecera-td">RUC</td>
<td class="cabecera-td">PERÚTEC ENTERPRISES SAC</td>
<td class="cabecera-td">FECHA EMISIÓN</td>
<td class="cabecera-td">31/08/2017</td>
</tr>
<tr>
<td class="cabecera-td">TELEFÓNO</td>
<td class="cabecera-td">997935085</td>
<td class="cabecera-td">FECHA DE ENTREGA</td>
<td class="cabecera-td">31/09/2017</td>
</tr>
<tr>
<td class="cabecera-td">CONTACTO</td>
<td class="cabecera-td">LUIS CLAUDIO PONCE</td>
<td class="cabecera-td">COMPRADOR</td>
<td class="cabecera-td">GUSTAVO MONTERO</td>
</tr>
<tr>
<td class="cabecera-td">EMAIL</td>
<td class="cabecera-td">soluciones@perutec.com.pe</td>
<td class="cabecera-td">REQUISCIÓN</td>
<td class="cabecera-td">0005213</td>
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
<tr>
<td class="detalle-td center">1</td>
<td class="detalle-td left">COMREACT</td>
<td class="detalle-td left">COMPRA DE REPUESTO PARA ACTIVO CARGADOR DE LAPTOP HP PROBOOK 4420S 01</td>
<td class="detalle-td center">1.00</td>
<td class="detalle-td center">UND</td>
<td class="detalle-td center">010000</td>
<td class="detalle-td center"></td>
<td class="detalle-td center">21.12</td>
<td class="detalle-td center">0.00</td>
<td class="detalle-td center">21.12</td>
<td class="detalle-td center">21.12</td>
</tr>
<tr>
<td class="detalle-td center">1</td>
<td class="detalle-td left">COMREACT</td>
<td class="detalle-td left">COMPRA DE REPUESTO PARA ACTIVO CARGADOR DE LAPTOP HP PROBOOK 4420S 01</td>
<td class="detalle-td center">1.00</td>
<td class="detalle-td center">UND</td>
<td class="detalle-td center">010000</td>
<td class="detalle-td center"></td>
<td class="detalle-td center">21.12</td>
<td class="detalle-td center">0.00</td>
<td class="detalle-td center">21.12</td>
<td class="detalle-td center">21.12</td>
</tr>
<tr>
<td class="detalle-td center">1</td>
<td class="detalle-td left">COMREACT</td>
<td class="detalle-td left">COMPRA DE REPUESTO PARA ACTIVO CARGADOR DE LAPTOP HP PROBOOK 4420S 01</td>
<td class="detalle-td center">1.00</td>
<td class="detalle-td center">UND</td>
<td class="detalle-td center">010000</td>
<td class="detalle-td center"></td>
<td class="detalle-td center">21.12</td>
<td class="detalle-td center">0.00</td>
<td class="detalle-td center">21.12</td>
<td class="detalle-td center">21.12</td>
</tr>
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
<td class="operacion-td">U$$ 21.12</td>
</tr>
<tr>
<td class="operacion-td">LUGAR DE ENTREGA</td>
<td class="operacion-td left"><?php echo DIRECCION; ?></td>
<td class="operacion-td right operacion-td-right">I.G.V<?php echo IGV; ?>%</td>
<td class="operacion-td left">U$$ 3.80</td>
</tr>
<tr>
<td class="operacion-td">MODO DE ENTREGA</td>
<td class="operacion-td left">ENVÍO</td>
<td class="operacion-td right operacion-td-right">VALOR DE VENTA</td>
<td class="operacion-td left">U$$ 24.92</td>
</tr>
<tr>
<td class="operacion-td">INFO TRANSFERENCIA</td>
<td class="operacion-td">N° DE CUENTA - ME  191-2172535-1-06</td>
<td class="operacion-td right operacion-td-right">PERCEPCIÓN</td>
<td class="operacion-td left">U$$ </td>
</tr>
<tr>
<td class="operacion-td">MONEDA</td>
<td class="operacion-td left">DOLARES AMERICANOS</td>
<td class="operacion-td right operacion-td-right">TOTAL</td>
<td class="operacion-td left">U$$ 24.92</td>
</tr>
<tr>
<td class="operacion-td">OBSERVACIONES</td>
<td class="operacion-td"></td>
<td class="operacion-td operacion-td-right"></td>
<td class="operacion-td"></td>
</tr>
</table>

<p class="mensaje"><?php echo MENSAJE; ?></p>



<div id="piedepagina">
<table>
<tr class="firmas">
<td class="firmas-td"><img src="../img/firma/firma01.jpg" alt="" width="250"></td>
<td class="firmas-td"><img src="../img/firma/firma02.jpg" alt="" width="250"></td>
<td class="firmas-td"><img src="../img/firma/firma03.jpg" alt="" width="250"></td>
</tr>
<tr class="firmas">
<td class="center">Gerente #1</td>
<td class="center">Gerente #2</td>
<td class="center">Jefe de Compras</td>
</tr>
</table>

</div>



</body>
</html>