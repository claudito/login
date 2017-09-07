<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('OS','numero')+1;

 ?>

Orden de Servicio # <?php echo $numero; ?>