<?php 

class Comovd
{


function __construct()
{

}


function lista($numero,$tipo)
{
	
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT  * FROM comovd WHERE numero=:numero AND tipo=:tipo";
	$statement = $conexion->prepare($query);
    $statement->bindParam(':tipo',$tipo);
    $statement->bindParam(':numero',$numero);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}




}




function transferir($tipo='',$rq='',$numero='',$orden='')
{
	try 
	{

		$modelo    = new Conexion();
		$conexion  = $modelo->get_conexion();
		$query     = "INSERT INTO comovd(numero,item,codigo,descripcion,unidad,cantidad,saldo,centro_costo,ot,tipo)
SELECT :orden,d.item,d.codigo,d.descripcion,d.unidad,d.cantidad,d.cantidad,d.centro_costo,d.ot,:tipo
FROM requisc AS c INNER JOIN requisd AS d ON c.numero=d.numero AND c.tipo=d.tipo WHERE c.tipo=:rq AND c.estado='P' AND c.numero=:numero;";
        $statement = $conexion->prepare($query);
		$statement->bindParam(':tipo',$tipo);
		$statement->bindParam(':rq',$rq);
		$statement->bindParam(':numero',$numero);
		$statement->bindParam(':orden',$orden);
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

	echo "Error:".$e->getMessage();
	}

}



public function actualizar($numero,$tipo,$precio,$item)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "UPDATE comovd  SET precio=:precio  WHERE numero=:numero AND tipo=:tipo AND item=:item";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$numero);
    $statement->bindParam(':tipo',$tipo);
    $statement->bindParam(':precio',$precio);
    $statement->bindParam(':item',$item);
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




}




 ?>