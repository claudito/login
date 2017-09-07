<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('NI','numero')+1;

 ?>

 Nota de Ingreso # <?php echo $numero; ?>