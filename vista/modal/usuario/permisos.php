<?php 

include'../../../autoload.php';
include'../../../session.php';

$menu           =  new Menu();
$submenu        =  new Submenu();
$usuario        =  $_GET['id'];
$carpeta        =  "usuario";

 ?>

 <form role="form" id="permisos">
  
 <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">

 <?php foreach ($menu->lista() as $key => $value): ?>
 <ul>
 <li><strong><?php echo $value['descripcion'] ?></strong></li>
 <ul>
 <?php foreach ($submenu->lista_nav($value['id']) as $key => $value): ?>
 <?php $permiso_menu   =  new Permiso_menu($value['id'],$usuario);  ?>
 <?php if ($permiso_menu->permiso_nav('estado')==1): ?>
 	<li><input type="checkbox" name="<?php echo $value['id']; ?>" id="" checked><?php echo $value['descripcion']; ?></li>
 <?php else: ?>
 	<li><input type="checkbox" name="<?php echo $value['id']; ?>" id=""><?php echo $value['descripcion']; ?></li>
 <?php endif ?>

 <?php endforeach ?>
 </ul>
 </ul>
 <?php endforeach ?>


<center> <button class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-refresh"></i> Actualizar Permisos</button></center>


</form>

<script>
    $("#permisos").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/permisos.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          //$('#permisosModal').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          //$('.modal-backdrop').remove();
          //loadTabla(1);
          }
      });
  });
</script>