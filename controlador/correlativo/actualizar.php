<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['codigo']) AND isset($_POST['descripcion']) AND isset($_POST['numero'])) 
{
	$id          =  $funciones->validar_xss($_POST['id']);
	$codigo      =  $funciones->validar_xss($_POST['codigo']);
	$descripcion =  $funciones->validar_xss($_POST['descripcion']);
	$numero 	 =  $funciones->validar_xss($_POST['numero']);

	if (strlen($id)>0 AND strlen($codigo)>0 AND strlen($descripcion)>0 AND strlen($numero)>0) 
	{
		$objeto      =  new Correlativo($codigo,$descripcion,$numero);
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
$numero 	 =  $funciones->validar_xss($_POST['numero']);



$objeto      =  new Correlativo($codigo,$descripcion,$numero);
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