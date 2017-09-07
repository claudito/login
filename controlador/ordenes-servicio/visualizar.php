<?php 

include'../../autoload.php';
include'../../session.php';

$id = $_GET['id'];

$message   =  new Message();
$funciones =  new Funciones();

$tipo 			=  $funciones->validar_xss($_POST['tipo']);

$objeto = new Aprobacion_documentos($tipo)
$valor = $objeto->visualizar();
?>