<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   

$objeto   =  new Centro_costo();

$carpeta  =  "centro_costo";

 ?>

<?php if (count($objeto->consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" >

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'codigo'); ?>" readonly>
</div>


<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'descripcion'); ?>" autocomplete="off">
</div>


<div class="form-group">
<label>ESTADO</label><br>
<?php if ($objeto->consulta($id,'estado')==1): ?>
   <label class="radio-inline">
    <input type="radio" name="estado"  value="1" checked> ACTIVO
  </label>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="0"> INACTIVO
</label> 
<?php else: ?>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="1" > ACTIVO
  </label>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="0" checked> INACTIVO
  </label>
<?php endif ?>


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