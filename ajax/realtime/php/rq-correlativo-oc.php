<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('OC','numero')+1;

 ?>

Orden de Compra # <?php echo $numero; ?>