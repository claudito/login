<?php 

include'../../autoload.php';
include'../../session.php';

$numero  =  $_POST['numero'];
$tipo    =  $_POST['tipo'];

$message  =  new Message();


if ($tipo=='RQ' || $tipo=='RS') 
{
  
  $valor_firma  = new Aprobacion_documentos($numero,$tipo);

  $firma_1      =  (isset($_POST['firma_1'])) ? 1 : $valor_firma->consulta('firma_1');
  $firma_2      =  (isset($_POST['firma_2'])) ? 1 : $valor_firma->consulta('firma_2');
  $firma_3      =  (isset($_POST['firma_3'])) ? 1 : $valor_firma->consulta('firma_3');

  $aprobacion_documentos =  new Aprobacion_documentos($numero,$tipo,$firma_1,$firma_2,$firma_3);
  $valor                 =  $aprobacion_documentos->actualizar();
  
} 
else if ($tipo=='OC' || $tipo=='OS') 
{
  $valor_firma  = new Aprobacion_documentos($numero,$tipo);

  $firma_1      =  (isset($_POST['firma_1'])) ? 1 : $valor_firma->consulta('firma_1');
  $firma_2      =  (isset($_POST['firma_2'])) ? 1 : $valor_firma->consulta('firma_2');
  $firma_3      =  (isset($_POST['firma_3'])) ? 1 : $valor_firma->consulta('firma_3');

  $aprobacion_documentos =  new Aprobacion_documentos($numero,$tipo,$firma_1,$firma_2,$firma_3);
  $valor                 =  $aprobacion_documentos->actualizar();
  
}
else
{
$valor = "noexiste";
}



switch ($valor) {
	case 'ok':
echo $message->mensaje("Buen Trabajo","success","Firma Registrada",2);
		break;
case 'noexiste':
echo $message->mensaje("Error","error","No existe el Documento",2);
		break;
	default:
echo $message->mensaje("Error","error","Consulte al área de Soporte",2);
		break;
}


 ?>