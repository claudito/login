<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();

if (isset($_POST['codigo']) AND isset($_POST['descripcion'])) 
{
	$codigo      =  $funciones->validar_xss($_POST['codigo']);
	$descripcion =  $funciones->validar_xss($_POST['descripcion']);

	if (strlen($codigo)>0 AND strlen($descripcion)>0) 
	{
		$objeto      =  new Articulo_tipo($codigo,$descripcion);
		$valor       =  $objeto->agregar();



		if ($valor=='existe') 
		{
		  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);
		} 
		else if($valor=='ok')
		{
		  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		}
		else
		{
		  echo  $message->mensaje("Error de Registro","error","Consulte al área de Soporte",2);
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