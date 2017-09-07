<?php 

class Articulo
{


protected $codigo;
protected $codigo2;
protected $descripcion;
protected $descripcion2;
protected $ficha;
protected $id_familia;
protected $id_unidad;
protected $id_tipo;
protected $estado;


function __construct($codigo='',$codigo2='',$descripcion='',$descripcion2='',$ficha='',$id_familia='',$id_unidad='',$id_tipo='',$estado='')
{
   $this->codigo        =  $codigo;
   $this->codigo2       =  $codigo2;
   $this->descripcion   =  $descripcion;
   $this->descripcion2  =  $descripcion2;
   $this->ficha         =  $ficha;
   $this->id_familia    =  $id_familia;
   $this->id_unidad     =  $id_unidad;
   $this->id_tipo       =  $id_tipo;
   $this->estado        =  $estado; 
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM articulo WHERE codigo=:codigo";
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
     $query     = "INSERT INTO articulo(codigo,codigo2,descripcion,descripcion2,ficha,id_familia,id_unidad,id_tipo)VALUES(:codigo,:codigo2,:descripcion,:descripcion2,:ficha,:id_familia,:id_unidad,:id_tipo)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':codigo2',$this->codigo2);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':descripcion2',$this->descripcion2);
    $statement->bindParam(':ficha',$this->ficha);
    $statement->bindParam(':id_familia',$this->id_familia);
    $statement->bindParam(':id_unidad',$this->id_unidad);
    $statement->bindParam(':id_tipo',$this->id_tipo);
    
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
     $query     = "DELETE FROM articulo WHERE id=:id";
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
     $query     = "UPDATE  articulo  SET codigo=:codigo,codigo2=:codigo2,descripcion=:descripcion,
     descripcion2=:descripcion2,ficha=:ficha,id_familia=:id_familia,id_unidad=:id_unidad,id_tipo=:id_tipo 
     WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':codigo2',$this->codigo2);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':descripcion2',$this->descripcion2);
    $statement->bindParam(':ficha',$this->ficha);
    $statement->bindParam(':id_familia',$this->id_familia);
    $statement->bindParam(':id_unidad',$this->id_unidad);
    $statement->bindParam(':id_tipo',$this->id_tipo);
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
	$query     = "SELECT a.id,a.codigo,a.codigo2,a.descripcion,a.descripcion2,a.ficha,f.id as idfamilia,f.descripcion as familia,u.id as idunidad,u.descripcion as unidad,
t.id as idtipo,t.codigo as codigotipo,t.descripcion as tipo,a.estado FROM articulo as a  
INNER JOIN unidad as u ON a.id_unidad=u.id
INNER JOIN familia as f ON a.id_familia=f.id
INNER JOIN articulo_tipo as t ON a.id_tipo=t.id ORDER BY a.codigo";
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
    $query     = "SELECT a.id,a.codigo,a.codigo2,a.descripcion,a.descripcion2,a.ficha,f.id as idfamilia,f.descripcion as familia,u.id as idunidad,u.descripcion as unidad,
t.id as idtipo,t.descripcion as tipo,a.estado FROM articulo as a  
INNER JOIN unidad as u ON a.id_unidad=u.id
INNER JOIN familia as f ON a.id_familia=f.id
INNER JOIN articulo_tipo as t ON a.id_tipo=t.id WHERE a.id=:id";
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