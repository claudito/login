<?php 

class Requisc
{


protected $numero;
protected $id_usuario;
protected $fecha_inicio;
protected $fecha_fin;
protected $comentario;
protected $centro_costo;
protected $ot;
protected $area;
protected $tipo;
protected $estado;
protected $prioridad;


function __construct($numero='',$id_usuario='',$fecha_inicio='',$fecha_fin='',$comentario='',$centro_costo='',$ot='',$area='',$tipo='',$estado='',$prioridad='')
{
   $this->numero        =  $numero;
   $this->id_usuario    =  $id_usuario;
   $this->fecha_inicio  =  $fecha_inicio;
   $this->fecha_fin     =  $fecha_fin;
   $this->comentario    =  $comentario;
   $this->centro_costo  =  $centro_costo;
   $this->ot            =  $ot;
   $this->area          =  $area;
   $this->tipo          =  $tipo;
   $this->estado        =  $estado;
   $this->prioridad     =  $prioridad;
 
}

public function agregar()
{

   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM requisc WHERE numero=:numero AND tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO requisc(numero,id_usuario,fecha_inicio,fecha_fin,comentario,centro_costo,ot,area,tipo,prioridad)VALUES(:numero,:id_usuario,:fecha_inicio,:fecha_fin,:comentario,:centro_costo,:ot,:area,:tipo,:prioridad)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':id_usuario',$this->id_usuario);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_fin',$this->fecha_fin);
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':ot',$this->ot);
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':prioridad',$this->prioridad);
    
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
     $query     = "DELETE FROM requisc WHERE id=:id";
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
     $query     = "UPDATE  requisc  SET  fecha_inicio=:fecha_inicio,fecha_fin=:fecha_fin,comentario=:comentario,centro_costo=:centro_costo,ot=:ot,area=:area,tipo=:tipo,estado=:estado,prioridad=:prioridad WHERE  numero=:id AND tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_fin',$this->fecha_fin);
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':ot',$this->ot);
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':estado',$this->estado);
    $statement->bindParam(':prioridad',$this->prioridad);
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





function lista($tipo)
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT r.id, r.numero, concat(u.nombres ,' ', u.apellidos) as usuario, r.fecha_inicio, r.fecha_fin, r.comentario,c.id as idcentro_costo, c.codigo as codigo_cc, c.descripcion as centro_costo, of.id as id_ot, of.codigo as codigo_ot, of.codigo_cliente as cliente_ot, a.id as idarea, a.codigo as codigo_area,a.descripcion as area, r.tipo, r.estado, r.prioridad
from requisc as r
left join area as a on r.area = a.id
left join usuario as u on r.id_usuario = u.id
left join centro_costo as c on r.centro_costo = c.id 
left join ord_fab as of on r.ot = of.codigo WHERE r.tipo=:tipo";
	$statement = $conexion->prepare($query);
  $statement->bindParam(':tipo',$tipo);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}


function lista_ordenes($tipo)
{
   
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT  * FROM requisc as c WHERE c.estado='P' AND c.tipo=:tipo AND 
c.numero IN (SELECT numero FROM requisd WHERE tipo=:tipo )";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':tipo',$tipo);
  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}






public function consulta($id,$campo,$tipo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT r.id, r.numero, concat(u.nombres ,' ', u.apellidos) as usuario, r.fecha_inicio, r.fecha_fin, r.comentario,c.id as idcentro_costo, c.codigo as codigo_cc, c.descripcion as centro_costo, of.id as id_ot, of.codigo as codigo_ot, of.codigo_cliente as cliente_ot ,a.id as idarea, a.codigo as codigo_area, a.descripcion as area, r.tipo, r.estado, r.prioridad
from requisc as r
left join area as a on r.area = a.id
left join usuario as u on r.id_usuario = u.id
left join centro_costo as c on r.centro_costo = c.id 
left join ord_fab as of on r.ot = of.codigo WHERE r.numero=:id AND r.tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':tipo',$tipo);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}






}



 ?>