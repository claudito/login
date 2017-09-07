<?php 

include'../../autoload.php';
include'../../session.php';

$message   = new Message();
$funciones = new Funciones();

$id           =  $funciones->validar_xss($_POST['id']);
$solicitante  =  $funciones->validar_xss($_POST['solicitante']);
$compras      =  $funciones->validar_xss($_POST['compras']);
$jefe_area    =  $funciones->validar_xss($_POST['jefe_area']);
$gerente      =  $funciones->validar_xss($_POST['gerente']);

$solicitante  =  ($solicitante=='on') ? 1 : 0 ;
$compras      =  ($compras=='on') ? 1 : 0 ;
$jefe_area    =  ($jefe_area=='on') ? 1 : 0 ;
$gerente      =  ($gerente=='on') ? 1 : 0 ;

$usuario_tipo =  new Usuario_tipo($id,$solicitante,$compras,$jefe_area,$gerente);
$valor        =  $usuario_tipo->actualizar();

switch ($valor) {
	case 'ok':
echo $message->mensaje("Permisos Actualizados","success","...",2);
		break;
	
	default:
echo $message->mensaje("Error","error","Consulte al área de soporte",2);
		break;
}


 ?>