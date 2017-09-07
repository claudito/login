<?php 

include'../../autoload.php';
include'../../session.php';

$message    =  new Message();
$funciones  = new Funciones();

if (isset($_POST['id']) AND isset($_POST['descripcion']) AND isset($_POST['ruta']) AND isset($_POST['item']) AND isset($_POST['menu'])) 
{
	$id          =  $funciones->validar_xss($_POST['id']);
	$descripcion =  $funciones->validar_xss($_POST['descripcion']);
	$ruta        =  $funciones->validar_xss($_POST['ruta']);
	$item        =  $funciones->validar_xss($_POST['item']);
	$menu        =  $funciones->validar_xss($_POST['menu']);

	if (strlen($id)>0 AND strlen($descripcion)>0 AND strlen($ruta)>0 AND strlen($item)>0 AND strlen($menu)>0) 
	{
		$objeto      =  new Submenu($descripcion,$ruta,$item,$menu);
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
$descripcion =  $funciones->validar_xss($_POST['descripcion']);
$ruta        =  $funciones->validar_xss($_POST['ruta']);
$item        =  $funciones->validar_xss($_POST['item']);
$menu        =  $funciones->validar_xss($_POST['menu']);


$objeto      =  new Submenu($descripcion,$ruta,$item,$menu);
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