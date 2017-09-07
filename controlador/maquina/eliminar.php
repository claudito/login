<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();

if (isset($_POST['id'])) 
{
	$id        =  $funciones->validar_xss($_POST['id']);

if (strlen($id)>0) 
{

$objeto      =  new Maquina();
$valor       =  $objeto->eliminar($id);

if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Eliminado",2);
}
else
{
  echo  $message->mensaje("Error de Eliminación","error","Consulte al área de Soporte",2);
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