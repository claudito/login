<?php 

class Usuario
{


protected $nombres;
protected $apellidos;
protected $correo;
protected $celular;
protected $user;
protected $pass;
protected $tipo;

function __construct($nombres='',$apellidos='',$correo='',$celular='',$user='',$pass='',$tipo='')
{
  $this->nombres          =  $nombres;
  $this->apellidos        =  $apellidos;
  $this->correo           =  $correo;
  $this->celular          =  $celular;
  $this->user             =  $user;
  $this->pass             =  $pass;
  $this->tipo             =  $tipo;
}


public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM usuario WHERE correo=:correo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':correo',$this->correo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO usuario(nombres,apellidos,correo,celular,user,pass)VALUES(:nombres,:apellidos,:correo,:celular,:user,:pass)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombres',$this->nombres);
    $statement->bindParam(':apellidos',$this->apellidos);
    $statement->bindParam(':correo',$this->correo);
    $statement->bindParam(':celular',$this->celular);
    $statement->bindParam(':user',$this->user);
    $statement->bindParam(':pass',$this->pass);
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


public function actualizar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  usuario  SET  nombres=:nombres,apellidos=:apellidos,
     celular=:celular,tipo=:tipo WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombres',$this->nombres);
    $statement->bindParam(':apellidos',$this->apellidos);
    $statement->bindParam(':celular',$this->celular);
    $statement->bindParam(':tipo',$this->tipo);
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
	$query     = "SELECT * FROM usuario ORDER BY nombres";
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
    $query     = "SELECT * FROM usuario WHERE id=:id";
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