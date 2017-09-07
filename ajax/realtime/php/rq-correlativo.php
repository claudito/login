<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('RQ','numero')+1;

 ?>

 Requerimiento de Compra # <?php echo $numero; ?>