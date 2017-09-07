<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('GS','numero')+1;

 ?>

 Guía de Salida # <?php echo $numero; ?>