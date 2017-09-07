<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('NS','numero')+1;

 ?>

 Nota de Salida # <?php echo $numero; ?>