<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['nombres']) AND isset($_POST['apellidos']) AND isset($_POST['celular']) AND isset($_POST['tipo'])) 
{
	$id          =  $funciones->validar_xss($_POST['id']);
	$nombres     =  $funciones->validar_xss($_POST['nombres']);
	$apellidos   =  $funciones->validar_xss($_POST['apellidos']);
	$celular     =  $funciones->validar_xss($_POST['celular']);
	$tipo        =  $funciones->validar_xss($_POST['tipo']);

	if (strlen($id)>0 AND strlen($nombres)>0  AND strlen($apellidos)>0 AND strlen($celular)>0 AND strlen($tipo)>0) 
	{
		$objeto      =  new Usuario($nombres,$apellidos,'',$celular,'','',$tipo);
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
$nombres     =  $funciones->validar_xss($_POST['nombres']);
$apellidos   =  $funciones->validar_xss($_POST['apellidos']);
$celular     =  $funciones->validar_xss($_POST['celular']);
$tipo        =  $funciones->validar_xss($_POST['tipo']);

$objeto      =  new Usuario($nombres,$apellidos,'',$celular,'','',$tipo);
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