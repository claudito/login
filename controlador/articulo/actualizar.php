<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['codigo']) AND isset($_POST['codigo2']) AND isset($_POST['descripcion']) AND isset($_POST['descripcion2']) AND isset($_POST['ficha']) AND isset($_POST['familia']) AND isset($_POST['unidad']) AND isset($_POST['tipo'])) 
{

	$id          	=  $funciones->validar_xss($_POST['id']);
	$codigo      	=  $funciones->validar_xss($_POST['codigo']);
	$codigo2      	=  $funciones->validar_xss($_POST['codigo2']);
	$descripcion	=  $funciones->validar_xss($_POST['descripcion']);
	$descripcion2   =  $funciones->validar_xss($_POST['descripcion2']);
	$ficha      	=  $funciones->validar_xss($_POST['ficha']);
	$id_familia     =  $funciones->validar_xss($_POST['familia']);
	$id_unidad     	=  $funciones->validar_xss($_POST['unidad']);
	$id_tipo      	=  $funciones->validar_xss($_POST['tipo']);

if (strlen($id)>0 AND strlen($codigo)>0 AND strlen($codigo2)>0 AND strlen($descripcion)>0 AND strlen($descripcion2)>0 AND strlen($ficha)>0 AND strlen($id_familia)>0 AND strlen($id_unidad)>0 AND strlen($id_tipo)>0) 

{
	$objeto      =  new Articulo($codigo,$codigo2,$descripcion,$descripcion2,$ficha,$id_familia,$id_unidad,$id_tipo);
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