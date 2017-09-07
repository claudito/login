<?php 

class Orden_trabajo
{


protected $codigo;
protected $codigo_cliente;
protected $unidad;
protected $descripcion;
protected $fecha_inicio;
protected $fecha_fin;
protected $cantidad;
protected $observacion;
protected $estado;


function __construct($codigo='',$codigo_cliente='',$unidad='',$descripcion='',$fecha_inicio='',$fecha_fin='',$cantidad='',$observacion='',$estado='')
{
   $this->codigo            =  $codigo;
   $this->codigo_cliente    =  $codigo_cliente;
   $this->unidad            =  $unidad;
   $this->descripcion       =  $descripcion;
   $this->fecha_inicio      =  $fecha_inicio;
   $this->fecha_fin         =  $fecha_fin;
   $this->cantidad          =  $cantidad;
   $this->observacion       =  $observacion;
   $this->estado            =  $estado;
 
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM ord_fab WHERE codigo=:codigo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO ord_fab(codigo,codigo_cliente,unidad,descripcion,fecha_inicio,fecha_fin,cantidad,observacion)VALUES(:codigo,:codigo_cliente,:unidad,:descripcion,:fecha_inicio,:fecha_fin,:cantidad,:observacion)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':codigo_cliente',$this->codigo_cliente);
    $statement->bindParam(':unidad',$this->unidad);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_fin',$this->fecha_fin);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':observacion',$this->observacion);
    
    
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}


public function eliminar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM ord_fab WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}


public function actualizar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  ord_fab  SET codigo=:codigo,codigo_cliente=:codigo_cliente,unidad=:unidad,descripcion=:descripcion,fecha_inicio=:fecha_inicio,fecha_fin=:fecha_fin,cantidad=:cantidad,observacion=:observacion,estado=:estado WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':codigo_cliente',$this->codigo_cliente);
    $statement->bindParam(':unidad',$this->unidad);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_fin',$this->fecha_fin);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':observacion',$this->observacion);
    $statement->bindParam(':estado',$this->estado);

    $statement->bindParam(':id',$id);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
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
	$query     = "SELECT of.id, of.codigo, c.id as idcliente, c.razon_social as cliente, u.id as idunidad, u.descripcion as unidad, of.descripcion, of.fecha_inicio, of.fecha_fin, of.cantidad, of.observacion, of.estado
from ord_fab as of
left join cliente as c on of.codigo_cliente = c.id
left join unidad as u on of.unidad = u.id";
	$statement = $conexion->prepare($query); 
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}





public function consulta($id,$campo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT of.id, of.codigo, c.id as idcliente, c.razon_social as cliente, u.id as idunidad, u.descripcion as unidad, of.descripcion, of.fecha_inicio, of.fecha_fin, of.cantidad, of.observacion, of.estado
from ord_fab as of
left join cliente as c on of.codigo_cliente = c.id
left join unidad as u on of.unidad = u.id WHERE of.id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}






}



 ?>