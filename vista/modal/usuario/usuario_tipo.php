<?php 

include'../../../autoload.php';
include'../../../session.php';

$id            =  $_GET['id'];
$usuario_tipo  =  new Usuario_tipo();
$carpeta       =  "usuario";
 ?>

 <?php if (count($usuario_tipo->lista($id))>0): ?>
<form id="actualizar" role="form">
  
<input type="hidden" name="id" value="<?php echo $id; ?>">
  
<ul>
<?php foreach ($usuario_tipo->lista($id) as $key => $value): ?>
<li>
<?php if ($value['solicitante']==1): ?>
<input type="checkbox" name="solicitante" id="" checked="" >SOLICITANTE
<?php else: ?>
<input type="checkbox" name="solicitante" id="" >SOLICITANTE
<?php endif ?>
</li>
<li>
<?php if ($value['compras']==1): ?>
<input type="checkbox" name="compras" id="" checked="" >COMPRAS
<?php else: ?>
<input type="checkbox" name="compras" id="" >COMPRAS
<?php endif ?>
</li>
<li>
<?php if ($value['jefe_area']==1): ?>
<input type="checkbox" name="jefe_area" id="" checked="" >JEFE DE ÁREA
<?php else: ?>
<input type="checkbox" name="jefe_area" id="" >JEFE DE ÁREA
<?php endif ?>
</li>
<li>
<?php if ($value['gerente']==1): ?>
<input type="checkbox" name="gerente" id="" checked="" >GERENTE
<?php else: ?>
<input type="checkbox" name="gerente" id="" >GERENTE
<?php endif ?>
</li>
<?php endforeach ?>
</ul>

<center><button class="btn btn-primary">Actualizar</button></center>
</form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/usuario_tipo.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          //$('#usuario-tipoModal').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          //$('.modal-backdrop').remove();
          //loadTabla(1);
          }
      });
  });
</script>

 <?php else: ?>
 <p class="alert alert-warning">No hay información disponible</p>
 <?php endif ?>