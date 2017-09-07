<?php 

class Maquina
{


protected $codigo;
protected $fecha_adquisicion;
protected $fecha_inicio;
protected $fecha_termino;
protected $cantidad;
protected $contrato_factura;
protected $descripcion;
protected $descripcion_abrv;
protected $modelo;
protected $serie;
protected $marca;
protected $estado;


function __construct($codigo='',$fecha_adquisicion='',$fecha_inicio='',$fecha_termino='',$cantidad='',$contrato_factura='',$descripcion='',$descripcion_abrv='',$modelo='',$serie='',$marca='',$estado='')
{
   $this->codigo                =  $codigo;
   $this->fecha_adquisicion     =  $fecha_adquisicion;
   $this->fecha_inicio          =  $fecha_inicio;
   $this->fecha_termino         =  $fecha_termino;
   $this->cantidad              =  $cantidad;
   $this->contrato_factura      =  $contrato_factura;
   $this->descripcion           =  $descripcion;
   $this->descripcion_abrv      =  $descripcion_abrv;
   $this->modelo                =  $modelo;
   $this->serie                 =  $serie;
   $this->marca                 =  $marca;
   $this->estado                =  $estado;
 
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM maquina WHERE codigo=:codigo";
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
     $query     = "INSERT INTO maquina(codigo,fecha_adquisicion,fecha_inicio,fecha_termino,cantidad,contrato_factura,descripcion,descripcion_abrv,modelo,serie,marca)VALUES(:codigo,:fecha_adquisicion,:fecha_inicio,:fecha_termino,:cantidad,:contrato_factura,:descripcion,:descripcion_abrv,:modelo,:serie,:marca)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':fecha_adquisicion',$this->fecha_adquisicion);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_termino',$this->fecha_termino);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':contrato_factura',$this->contrato_factura);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':descripcion_abrv',$this->descripcion_abrv);
    $statement->bindParam(':modelo',$this->modelo);
    $statement->bindParam(':serie',$this->serie);
    $statement->bindParam(':marca',$this->marca);
    
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
     $query     = "DELETE FROM maquina WHERE id=:id";
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
     $query     = "UPDATE  maquina  SET codigo=:codigo,fecha_adquisicion=:fecha_adquisicion,fecha_inicio=:fecha_inicio,fecha_termino=:fecha_termino,cantidad=:cantidad,contrato_factura=:contrato_factura,descripcion=:descripcion,descripcion_abrv=:descripcion_abrv,modelo=:modelo,serie=:serie,marca=:marca,estado=:estado WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':fecha_adquisicion',$this->fecha_adquisicion);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_termino',$this->fecha_termino);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':contrato_factura',$this->contrato_factura);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':descripcion_abrv',$this->descripcion_abrv);
    $statement->bindParam(':modelo',$this->modelo);
    $statement->bindParam(':serie',$this->serie);
    $statement->bindParam(':marca',$this->marca);
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
	$query     = "SELECT * FROM maquina ORDER BY codigo";
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
    $query     = "SELECT * FROM maquina WHERE id=:id";
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