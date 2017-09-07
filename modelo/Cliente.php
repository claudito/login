<?php

class Cliente
{


protected $codigo;
protected $contacto;
protected $razon_social;
protected $ruc;
protected $dni;
protected $direccion1;
protected $direccion2;
protected $telefono;
protected $correo;


function __construct($codigo='',$contacto='', $razon_social='', $ruc='', $dni='', $direccion1='', $direccion2='', $telefono='', $correo='')
{
   $this->codigo        = $codigo;
   $this->contacto      = $contacto;
   $this->razon_social  = $razon_social;
   $this->ruc           = $ruc;
   $this->dni           = $dni;
   $this->direccion1    = $direccion1;
   $this->direccion2    = $direccion2;
   $this->telefono      = $telefono;
   $this->correo        = $correo;
 
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM cliente WHERE codigo=:codigo";
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
     $query     = "INSERT INTO cliente(codigo,contacto,razon_social,ruc,dni,direccion1,direccion2,telefono,correo)VALUES(:codigo,:contacto,:razon_social,:ruc,:dni,:direccion1,:direccion2,:telefono,:correo)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':contacto',$this->contacto);
    $statement->bindParam(':razon_social',$this->razon_social);
    $statement->bindParam(':ruc',$this->ruc);
    $statement->bindParam(':dni',$this->dni);
    $statement->bindParam(':direccion1',$this->direccion1);
    $statement->bindParam(':direccion2',$this->direccion2);
    $statement->bindParam(':telefono',$this->telefono);
    $statement->bindParam(':correo',$this->correo);
    
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
     $query     = "DELETE FROM  cliente WHERE id=:id";
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
     $query     = "UPDATE  cliente  SET codigo=:codigo,contacto=:contacto,razon_social=:razon_social,ruc=:ruc,dni=:dni,direccion1=:direccion1,direccion2=:direccion2,telefono=:telefono,correo=:correo WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':contacto',$this->contacto);
    $statement->bindParam(':razon_social',$this->razon_social);
    $statement->bindParam(':ruc',$this->ruc);
    $statement->bindParam(':dni',$this->dni);
    $statement->bindParam(':direccion1',$this->direccion1);
    $statement->bindParam(':direccion2',$this->direccion2);
    $statement->bindParam(':telefono',$this->telefono);
    $statement->bindParam(':correo',$this->correo);
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
	$query     = "SELECT * FROM cliente ORDER BY razon_social";
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
    $query     = "SELECT * FROM cliente WHERE id=:id";
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