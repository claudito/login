<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   

$objeto   =  new Usuario();

$carpeta  =  "usuario";

 ?>

<?php if (count($objeto->consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'nombres'); ?>">
</div>

<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'apellidos'); ?>">
</div>

<div class="form-group">
<label>CORREO</label>
<input type="email" name="correo" id=""  required="" class="form-control" value="<?php echo $objeto->consulta($id,'correo'); ?>" readonly>
</div>

<div class="form-group">
<label>CELULAR</label>
<input type="text" name="celular" id=""  required="" class="form-control" maxlength="200" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'celular'); ?>">
</div>

<div class="form-group">
<label>TIPO</label>
<select name="tipo" id="" class="form-control" required="">
<?php if ($objeto->consulta($id,'tipo')=='admin'): ?>
<option value="admin">ADMIN</option> 
<option value="user">USER</option> 
<?php else: ?>
 <option value="user">USER</option> 
 <option value="admin">ADMIN</option> 
<?php endif ?>
</select>
</div>



<button class="btn btn-primary">Actualizar</button>

</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#editModal').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>


<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>