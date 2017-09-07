<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['codigo']) AND isset($_POST['descripcion'])) 
{
	$id          =  $funciones->validar_xss($_POST['id']);
	$codigo      =  $funciones->validar_xss($_POST['codigo']);
	$descripcion =  $funciones->validar_xss($_POST['descripcion']);

	if (strlen($id)>0 AND strlen($codigo)>0 AND strlen($descripcion)>0) 
	{
		$objeto      =  new Unidad($codigo,$descripcion);
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

/*
$id          =  $funciones->validar_xss($_POST['id']);
$codigo      =  $funciones->validar_xss($_POST['codigo']);
$descripcion =  $funciones->validar_xss($_POST['descripcion']);



$objeto      =  new Unidad($codigo,$descripcion);
$valor       =  $objeto->actualizar($id);

if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
}
else
{
  echo  $message->mensaje("Error de Actualización","error","Consulte al área de Soporte",2);
}

*/  

 ?>