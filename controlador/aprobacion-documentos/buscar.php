<?php 

include'../../autoload.php';
include'../../session.php';

$funciones  =  new Funciones();


$tipo       = $funciones->validar_xss($_POST['tipo']);


$_SESSION['tipo_documento'] = $tipo;


 ?>