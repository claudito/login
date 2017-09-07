<?php 

include'../../autoload.php';
include'../../session.php';

$message      =  new Message();
$funciones    =  new Funciones();
$usuario_tipo =  new Usuario_tipo();

if (isset($_POST['nombres']) AND isset($_POST['apellidos']) AND isset($_POST['correo']) AND isset($_POST['celular']) AND isset($_POST['pass'])) 
{
	$nombres   =  $funciones->validar_xss($_POST['nombres']);
	$apellidos =  $funciones->validar_xss($_POST['apellidos']);
	$correo    =  $funciones->validar_xss($_POST['correo']);
	$celular   =  $funciones->validar_xss($_POST['celular']);
	$pass      =  $funciones->validar_xss($_POST['pass']);

	if (strlen($nombres)>0 AND strlen($apellidos)>0 AND strlen($correo)>0 AND strlen($celular)>0 AND strlen($pass)) 
	{
		$objeto    =  new Usuario($nombres,$apellidos,$correo,$celular,$correo,md5($pass));
		$valor     =  $objeto->agregar();

		if ($valor=='existe') 
		{
		  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);


		} 
		else if($valor=='ok')
		{
		  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		  $usuario_tipo->agregar_permisos();
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
$nombres   =  $funciones->validar_xss($_POST['nombres']);
$apellidos =  $funciones->validar_xss($_POST['apellidos']);
$correo    =  $funciones->validar_xss($_POST['correo']);
$celular   =  $funciones->validar_xss($_POST['celular']);
$pass      =  $funciones->validar_xss($_POST['pass']);

$objeto    =  new Usuario($nombres,$apellidos,$correo,$celular,$correo,md5($pass));
$valor     =  $objeto->agregar();


if ($valor=='existe') 
{
  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);


} 
else if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
  $usuario_tipo->agregar_permisos();
}
else
{
  echo  $message->mensaje("Error de Registro","error","Consulte al área de Soporte",2);
}

 */  

 ?>