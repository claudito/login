<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['fecha_inicio']) AND isset($_POST['fecha_fin']) AND isset($_POST['comentario']) AND isset($_POST['centro_costo']) AND isset($_POST['ot']) AND isset($_POST['area']) AND isset($_POST['tipo']) AND isset($_POST['estado']) 
	 AND isset($_POST['prioridad']))
{
	
	$id          	=  $funciones->validar_xss($_POST['id']);
	$fecha_inicio 	=  $funciones->validar_xss($_POST['fecha_inicio']);
	$fecha_fin 		=  $funciones->validar_xss($_POST['fecha_fin']);
	$comentario 	=  $funciones->validar_xss($_POST['comentario']);
	$centro_costo 	=  $funciones->validar_xss($_POST['centro_costo']);
	$ot 			=  $funciones->validar_xss($_POST['ot']);
	$area 			=  $funciones->validar_xss($_POST['area']);
	$tipo 			=  $funciones->validar_xss($_POST['tipo']);
	$estado 		=  $funciones->validar_xss($_POST['estado']);
	$prioridad 		=  $funciones->validar_xss($_POST['prioridad']);


if (strlen($id)>0 AND strlen($fecha_inicio)>0 AND strlen($fecha_fin)>0 AND strlen($comentario)>0 AND strlen($centro_costo)>0 AND strlen($ot)>0 AND strlen($area)>0 AND strlen($tipo)>0 AND strlen($estado)>0 AND strlen($prioridad)>0) 
{
	
$objeto      =  new Requisc('','',$fecha_inicio,$fecha_fin,$comentario,$centro_costo,$ot,$area,$tipo,$estado,$prioridad);
$valor       =  $objeto->actualizar($id);

if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
}
else
{
  echo  $message->mensaje("Error de Actualización","error","Consulte al área de Soporte",2);
}

} 
else 
{
echo  $message->mensaje("Algún dato esta vacío","error","Verifique de nuevo",2);
}


} 


else 
{
echo  $message->mensaje("Algúna variable no esta definida","error","Consulte al área de soporte",2);
}

  
 ?>