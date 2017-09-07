<?php 

class Permiso_menu
{

protected $submenu;
protected $usuario;
protected $estado;


function __construct($submenu='',$usuario='',$estado='')
{
   $this->submenu  = $submenu;
   $this->usuario  = $usuario;
   $this->estado   = $estado;
   
}


public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM permiso_menu WHERE id_submenu=:submenu AND id_usuario=:usuario";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':submenu',$this->submenu);
    $statement->bindParam(':usuario',$this->usuario);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO permiso_menu(id_submenu,id_usuario)VALUES(:submenu,:usuario)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':submenu',$this->submenu);
    $statement->bindParam(':usuario',$this->usuario);
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


public function actualizar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE permiso_menu  SET estado=:estado
        WHERE id_submenu=:submenu AND id_usuario=:usuario";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':submenu',$this->submenu);
    $statement->bindParam(':usuario',$this->usuario);
    $statement->bindParam(':estado',$this->estado);
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


public function eliminar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM permiso_menu where id_submenu=:submenu";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':submenu',$this->submenu);
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





public function permiso_nav($campo)
{
   
  try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT  * FROM permiso_menu WHERE id_submenu=:submenu AND id_usuario=:usuario";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':submenu',$this->submenu);
    $statement->bindParam(':usuario',$this->usuario);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }

}


function agregar_submenu()
{

$usuario  = new Usuario();
$submenu  = new Submenu();

foreach ($submenu->lista() as $key_submenu => $value_submenu) {

foreach ($usuario->lista() as $key_usuario => $value_usuario) {

$permiso_menu  = new Permiso_menu($value_submenu['id'],$value_usuario['id'],0);
$permiso_menu->agregar();

}

}



}



}




 ?>