<?php 

class Usuario_tipo
{

protected $id_usuario;
protected $solicitante;
protected $compras;
protected $jefe_area;
protected $gerente;


function __construct($id_usuario='',$solicitante='',$compras='',$jefe_area='',$gerente='')
{
   $this->id_usuario    =  $id_usuario;
   $this->solicitante   =  $solicitante;
   $this->compras       =  $compras;
   $this->jefe_area     =  $jefe_area;
   $this->gerente       =  $gerente;
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM usuario_tipo WHERE id_usuario=:id_usuario";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id_usuario',$this->id_usuario);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO usuario_tipo(id_usuario,solicitante,compras,jefe_area,gerente)VALUES(:id_usuario,:solicitante,:compras,:jefe_area,:gerente)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id_usuario',$this->id_usuario);
    $statement->bindParam(':solicitante',$this->solicitante);
    $statement->bindParam(':compras',$this->compras);
    $statement->bindParam(':jefe_area',$this->jefe_area);
    $statement->bindParam(':gerente',$this->gerente);
    
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
     $query     = "DELETE FROM usuario_tipo WHERE id=:id";
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


public function actualizar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  usuario_tipo  SET solicitante=:solicitante,compras=:compras,jefe_area=:jefe_area,gerente=:gerente WHERE id_usuario=:id_usuario";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id_usuario',$this->id_usuario);
    $statement->bindParam(':solicitante',$this->solicitante);
    $statement->bindParam(':compras',$this->compras);
    $statement->bindParam(':jefe_area',$this->jefe_area);
    $statement->bindParam(':gerente',$this->gerente);
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





function lista($id)
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT * FROM usuario_tipo WHERE id_usuario='".$id."'";
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
    $query     = "SELECT * FROM usuario_tipo WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}



function agregar_permisos()
{

$usuario  =  new Usuario();
foreach ($usuario->lista() as $key => $value) {
  
$usuario_tipo  = new Usuario_tipo($value['id'],0,0,0,0);
$usuario_tipo->agregar();

}


}



}



 ?>