<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('RS','numero')+1;

 ?>

 Requerimiento de Servicio # <?php echo $numero; ?>