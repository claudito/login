<?php 

include'../../autoload.php';
include'../../session.php';

$message        =  new Message();

$numero         =  $_POST['requerimiento'];
$rq             =  "RQ";
$tipo           =  "OC";
$orden          =  $_POST['orden'];

$comovd   =  new Comovd();
$comovc   =  new Comovc();
$comovc->actualizar_rq($orden,$tipo,$numero);

$valor    =  $comovd->transferir($tipo,$rq,$numero,$orden);


switch ($valor) {
	case 'ok':
echo $message->mensaje('Buen Trabajo','success','Información Transferida',2);
		break;
	
	default:
echo $message->mensaje('Error','error','Consulte al área de Soporte',2);
		break;
}

 ?>