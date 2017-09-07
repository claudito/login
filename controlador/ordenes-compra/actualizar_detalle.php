<?php 

include'../../autoload.php';
include'../../session.php';

$precio  =  $_POST['precio'];
$item    =  $_POST['item'];
$numero  =  $_POST['numero'];
$tipo    =  "OC";

$message = new Message();
$comovd  =  new Comovd();

foreach ($precio as $key => $value_precio) {

   $value_item = $item[$key];
	
   $valor  = $comovd->actualizar($numero,$tipo,$value_precio,$value_item);

   switch ($valor) {
   	case 'ok':
echo $message->mensaje('Buen Trabajo','success','Información Actualizada',2);
   		break;
   	
   	default:
echo $message->mensaje('Error','error','Consulte al área de soporte',2);
   		break;
   }


}

 ?>