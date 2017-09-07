<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   

$objeto   =  new Articulo();

$carpeta  =  "articulo";

 ?>

<?php if (count($objeto->consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'codigo'); ?>" readonly>
</div>

<div class="form-group">
<label>CÓDIGO 2</label>
<input type="text" name="codigo2" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'codigo2'); ?>">
</div>


<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'descripcion'); ?>">
</div>

<div class="form-group">
<label>DESCRIPCIÓN 2</label>
<input type="text" name="descripcion2" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'descripcion2'); ?>">
</div>

<div class="form-group">
<label>CÓDIGO DE FAMILIA</label>
<select name="familia" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'idfamilia'); ?>"><?php echo  $objeto->consulta($id,'familia')?></option>
<?php 
$familia   =  new Familia();
foreach ($familia->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'idfamilia')!==$value['id']): ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?>

<?php endforeach ?>
</select>



</div>

<div class="form-group">
<label>CÓDIGO DE UNIDAD</label>
<select name="unidad" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'idunidad'); ?>"><?php echo  $objeto->consulta($id,'unidad')?></option>
<?php 
$unidad   =  new Unidad();
foreach ($unidad->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'idunidad')!==$value['id']): ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?>

<?php endforeach ?>
</select>
</div>

<div class="form-group">
<label>CÓDIGO DE TIPO DE ARTÍCULO</label>
<select name="tipo" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'idtipo'); ?>"><?php echo  $objeto->consulta($id,'tipo')?></option>
<?php 
$articulo_tipo   =  new Articulo_tipo();
foreach ($articulo_tipo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'idtipo')!==$value['id']): ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?>

<?php endforeach ?>
</select>
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


<div class="form-group">
<label>FICHA TÉCNICA</label>
<textarea name="ficha" id="" rows="5" class="form-control" onchange="Mayusculas(this)">
  <?php echo $objeto->consulta($id,'ficha'); ?>
</textarea>
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