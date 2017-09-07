<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['codigo']) AND isset($_POST['descripcion']) AND isset($_POST['estado'])) 
{
	$id          =  $funciones->validar_xss($_POST['id']);
	$codigo      =  $funciones->validar_xss($_POST['codigo']);
	$descripcion =  $funciones->validar_xss($_POST['descripcion']);
	$estado 	 =  $funciones->validar_xss($_POST['estado']);

	if (strlen($id)>0 AND strlen($codigo)>0 AND strlen($descripcion)>0 AND strlen($estado)>0) 
	{
		$objeto      =  new Centro_costo($codigo,$descripcion,$estado);
		$valor       =  $objeto->actualizar($id);

		//echo strlen($descripcion);
		
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