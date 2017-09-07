<?php 

class Aprobacion_documentos
{
	protected $numero;
	protected $tipo;
	protected $firma_1;
	protected $firma_2;
	protected $firma_3;
	protected $firma_4;

function __construct($numero='',$tipo='',$firma_1='',$firma_2='',$firma_3='',$firma_4='')
{
	$this->numero 	= $numero;
	$this->tipo 	  = $tipo;
	$this->firma_1 	= $firma_1;
	$this->firma_2 	= $firma_2;
	$this->firma_3 	= $firma_3;
	$this->firma_4 	= $firma_4;	

}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM aprobacion_documentos WHERE tipo=:tipo AND nro_documento=:numero";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':numero',$this->numero);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {

    $query = "INSERT INTO aprobacion_documentos(nro_documento,tipo,firma_1,firma_2,firma_3,firma_4)
               VALUES(:numero,:tipo,:firma_1,:firma_2,:firma_3,:firma_4)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':firma_1',$this->firma_1);
    $statement->bindParam(':firma_2',$this->firma_2);
    $statement->bindParam(':firma_3',$this->firma_3);
    $statement->bindParam(':firma_4',$this->firma_4);
    
    if($statement)
    {
    $statement->execute();
    return "ok";
    }
    else
    {
    return "error";
    }

    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}



public function actualizar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  aprobacion_documentos  SET firma_1=:firma_1,firma_2=:firma_2,firma_3=:firma_3 WHERE  nro_documento=:numero AND tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':firma_1',$this->firma_1);
    $statement->bindParam(':firma_2',$this->firma_2);
    $statement->bindParam(':firma_3',$this->firma_3);
    if($statement)
    {
    $statement->execute();
    return "ok";
    }
    else
    {
    return "error";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}

function lista()
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT ad.id, ad.nro_documento, r.tipo as tipo, ad.firma_1, ad.firma_2, ad.firma_3, ad.firma_4
from aprobacion_documentos as ad
left join requisc as r on ad.tipo = r.tipo";
	$statement = $conexion->prepare($query);
  //$statement->bindParam(':tipo',$tipo);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}

public function consulta($campo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT  * FROM aprobacion_documentos  WHERE nro_documento=:numero AND tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}



public function documentos($tipo)
{

try
{

$tipo      =  $tipo;
$modelo    = new Conexion();
$conexion  = $modelo->get_conexion();
switch ($tipo) {
  case 'RQ':
  $query =  "
SELECT r.id,r.tipo,r.numero, concat(u.nombres ,' ', u.apellidos) as usuario,ap.firma_1,ap.firma_2,ap.firma_3,ap.firma_4
FROM requisc as r
INNER JOIN usuario as u on r.id_usuario = u.id 
INNER JOIN (SELECT ap.nro_documento,ap.tipo,ap.firma_1,ap.firma_2,ap.firma_3,ap.firma_4  FROM aprobacion_documentos as ap) as ap
ON r.numero=ap.nro_documento AND r.tipo=ap.tipo
WHERE  r.tipo='RQ' AND r.estado='P';

";
  break;
  case 'RS':
  $query =  "
SELECT r.id,r.tipo,r.numero, concat(u.nombres ,' ', u.apellidos) as usuario,ap.firma_1,ap.firma_2,ap.firma_3,ap.firma_4
FROM requisc as r
INNER JOIN usuario as u on r.id_usuario = u.id 
INNER JOIN (SELECT ap.nro_documento,ap.tipo,ap.firma_1,ap.firma_2,ap.firma_3,ap.firma_4  FROM aprobacion_documentos as ap) as ap
ON r.numero=ap.nro_documento AND r.tipo=ap.tipo
WHERE  r.tipo='RS' AND r.estado='P';

";
  break;
  case 'OC':
  $query =  "SELECT c.id,c.tipo,c.numero, concat(u.nombres, ' ',u.apellidos) as usuario,ap.firma_1,ap.firma_2,ap.firma_3,ap.firma_4
FROM comovc as c
INNER JOIN usuario as u on c.id_usuario = u.id
INNER JOIN (SELECT ap.nro_documento,ap.tipo,ap.firma_1,ap.firma_2,ap.firma_3,ap.firma_4  FROM aprobacion_documentos as ap) as ap
ON c.numero=ap.nro_documento AND  c.tipo=ap.tipo
WHERE c.tipo='OC' AND c.estado='00'
";
  break;
  case 'OS':
  $query =  "SELECT c.id,c.tipo,c.numero, concat(u.nombres, ' ',u.apellidos) as usuario,ap.firma_1,ap.firma_2,ap.firma_3,ap.firma_4
FROM comovc as c
INNER JOIN usuario as u on c.id_usuario = u.id
INNER JOIN (SELECT ap.nro_documento,ap.tipo,ap.firma_1,ap.firma_2,ap.firma_3,ap.firma_4  FROM aprobacion_documentos as ap) as ap
ON c.numero=ap.nro_documento AND  c.tipo=ap.tipo
WHERE c.tipo='OS' AND c.estado='00'
";
  break;
  
  default:
  $query= "SELECT s.id, s.numero, concat(u.nombres, ' ',u.apellidos) as usuario
from comovc as s
left join usuario as u on s.id_usuario = u.id
WHERE s.tipo='NO EXISTE' AND s.estado='01'";
    break;
}

$statement = $conexion->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
return $result;


} 
catch (Exception $e) 
{

echo "ERROR: ".$e->getMessage();
}

}




}

?>