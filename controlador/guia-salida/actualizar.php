<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();


	$numero      	=  $funciones->validar_xss($_POST['numero']);
	$id_usuario 	=  $funciones->validar_xss($_POST['id_usuario']);
	$id_proveedor 	=  $funciones->validar_xss($_POST['id_proveedor']);
	$fecha_inicio 	=  $funciones->validar_xss($_POST['fecha_inicio']);
	$fecha_fin 		=  $funciones->validar_xss($_POST['fecha_fin']);
	$comentario 	=  $funciones->validar_xss($_POST['comentario']);
    $centro_costo 	=  $funciones->validar_xss($_POST['centro_costo']);
	$ot 			=  $funciones->validar_xss($_POST['ot']);
	$area 			=  $funciones->validar_xss($_POST['area']);
	$tipo 			=  $funciones->validar_xss($_POST['tipo']);
	$estado 		=  $funciones->validar_xss($_POST['estado']);
	$prioridad 		=  $funciones->validar_xss($_POST['prioridad']);


$objeto      =  new Movalmcab($numero,$id_usuario,$id_proveedor,$fecha_inicio,$fecha_fin,$comentario,$centro_costo,$ot,$area,$tipo,$estado,$prioridad);
$valor       =  $objeto->actualizar();

if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
}
else
{
  echo  $message->mensaje("Error de Actualización","error","Consulte al área de Soporte",2);
}



 ?>