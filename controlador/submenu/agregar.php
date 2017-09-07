<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['descripcion']) AND isset($_POST['ruta']) AND isset($_POST['item']) AND isset($_POST['menu'])) 
{
	$descripcion =  $funciones->validar_xss($_POST['descripcion']);
	$ruta        =  $funciones->validar_xss($_POST['ruta']);
	$item        =  $funciones->validar_xss($_POST['item']);
	$menu        =  $funciones->validar_xss($_POST['menu']);

	if (strlen($descripcion)>0 AND strlen($ruta)>0 AND strlen($item)>0 AND strlen($menu)>0) 
	{
		$objeto      =  new Submenu($descripcion,$ruta,$item,$menu);
		$valor       =  $objeto->agregar();

		if ($valor=='existe') 
		{
		  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);
		} 
		else if($valor=='ok')
		{
		  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		  $permiso_menu = new Permiso_menu();
		  $permiso_menu->agregar_submenu();

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


/*
$descripcion =  $funciones->validar_xss($_POST['descripcion']);
$ruta        =  $funciones->validar_xss($_POST['ruta']);
$item        =  $funciones->validar_xss($_POST['item']);
$menu        =  $funciones->validar_xss($_POST['menu']);


$objeto      =  new Submenu($descripcion,$ruta,$item,$menu);
$valor       =  $objeto->agregar();



if ($valor=='existe') 
{
  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);
} 
else if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
  $permiso_menu = new Permiso_menu();
  $permiso_menu->agregar_submenu();

}
else
{
  echo  $message->mensaje("Error de Registro","error","Consulte al área de Soporte",2);
}
*/
 ?>