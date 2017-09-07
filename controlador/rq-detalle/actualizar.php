<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();


$id          	= $funciones->validar_xss($_POST['idnumero']);
$cantidad    	= $funciones->validar_xss($_POST['cantidad']);
$saldo       	= $funciones->validar_xss($_POST['cantidad']);
$centro_costo	= $funciones->validar_xss($_POST['centro_costo']);
$ot				= $funciones->validar_xss($_POST['ot']);
$comentario  	= $funciones->validar_xss($_POST['comentario']);


$requisd     = new Requisd('$numero','$item','$codigo','$descripcion','$unidad',$cantidad,$saldo,$centro_costo,$ot,$comentario,'$fecha','$tipo');
$valor       = $requisd->actualizar($id);

switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>