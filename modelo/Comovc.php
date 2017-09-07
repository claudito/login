<?php 

class Comovc
{


protected $numero;
protected $id_usuario;
protected $id_proveedor;
protected $fecha_inicio;
protected $fecha_fin;
protected $comentario;
protected $centro_costo;
protected $ot;
protected $area;
protected $tipo;
protected $estado;
protected $prioridad;


function __construct($numero='',$id_usuario='',$id_proveedor='',$fecha_inicio='',$fecha_fin='',$comentario='',$centro_costo='',$ot='',$area='',$tipo='',$estado='',$prioridad='',$requerimiento='')
{
   $this->numero        =  $numero;
   $this->id_usuario    =  $id_usuario;
   $this->id_proveedor  =  $id_proveedor;
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
    $query     = "SELECT * FROM comovc WHERE numero=:numero AND tipo=:tipo";
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
     $query     = "INSERT INTO comovc(numero,id_usuario,id_proveedor,fecha_inicio,fecha_fin,comentario,centro_costo,ot,area,tipo,prioridad)VALUES(:numero,:id_usuario,:id_proveedor,:fecha_inicio,:fecha_fin,:comentario,:centro_costo,:ot,:area,:tipo,:prioridad)";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':id_usuario',$this->id_usuario);
    $statement->bindParam(':id_proveedor',$this->id_proveedor);
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
     $query     = "DELETE FROM comovc WHERE id=:id";
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
     $query     = "UPDATE  comovc  SET id_proveedor=:id_proveedor,fecha_inicio=:fecha_inicio,fecha_fin=:fecha_fin,comentario=:comentario,centro_costo=:centro_costo,ot=:ot,area=:area,tipo=:tipo,estado=:estado,prioridad=:prioridad,requerimiento=:requerimiento WHERE  numero=:numero AND tipo=:tipo";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':id_proveedor',$this->id_proveedor);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_fin',$this->fecha_fin);
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':ot',$this->ot);
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':estado',$this->estado);
    $statement->bindParam(':prioridad',$this->prioridad);
    $statement->bindParam(':requerimiento',$this->requerimiento);
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


public function actualizar_rq($numero,$tipo,$requerimiento)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  comovc  SET requerimiento=:requerimiento WHERE 
      numero=:numero AND tipo=:tipo";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$numero);
    $statement->bindParam(':tipo',$tipo);
    $statement->bindParam(':requerimiento',$requerimiento);
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
	$query     = "SELECT s.id, s.numero, concat(u.nombres, ' ',u.apellidos) as usuario, p.id as idproveedor, p.contacto as proveedor, s.fecha_inicio, s.fecha_fin, s.comentario,
 c.id as idcentro_costo,c.codigo as codigo_centrocosto, c.descripcion as centro_costo, of.id as id_ot, of.codigo as codigo_ot, of.codigo_cliente as cliente_ot ,a.codigo as areacodigo,a.id as idarea, a.descripcion as area, s.tipo, s.estado, s.prioridad
from comovc as s
left join usuario as u on s.id_usuario = u.id
left join centro_costo as c on s.centro_costo = c.codigo
left join area as a on s.area = a.codigo
left join proveedor as p on s.id_proveedor = p.id 
left join ord_fab as of on s.ot = of.codigo
WHERE s.tipo=:tipo";

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
    $query     = "SELECT s.id,s.requerimiento,s.numero, concat(u.nombres, ' ',u.apellidos) as usuario, p.id as idproveedor,p.ruc,p.direccion1,p.telefono,p.contacto,p.correo,p.razon_social as proveedor, s.fecha_inicio, s.fecha_fin, s.comentario,
 c.id as idcentro_costo,c.codigo as codigo_centrocosto, c.descripcion as centro_costo, of.id as id_ot, of.codigo as codigo_ot, of.codigo_cliente as cliente_ot,a.codigo as areacodigo,a.id as idarea, a.descripcion as area, s.tipo, s.estado, s.prioridad
from comovc as s
left join usuario as u on s.id_usuario = u.id
left join centro_costo as c on s.centro_costo = c.codigo
left join area as a on s.area = a.codigo
left join proveedor as p on s.id_proveedor = p.id 
left join ord_fab as of on s.ot = of.codigo
WHERE s.numero=:id AND s.tipo=:tipo";
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