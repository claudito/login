<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   

$objeto   =  new Orden_trabajo();

$carpeta  =  "orden-trabajo";

 ?>

<?php if (count($objeto->consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off" >

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'codigo'); ?>" readonly>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>CLIENTE</label>
<select name="codigo_cliente" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'idcliente') ?>"><?php echo $objeto->consulta($id,'cliente') ?></option>
<?php 
$cliente  =  new Cliente();
foreach ($cliente->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'idcliente')!==$value['id']): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['codigo'].' - '.$value['razon_social']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>UNIDAD</label>
<select name="unidad" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'idunidad') ?>"><?php echo $objeto->consulta($id,'unidad') ?></option>
<?php 
$unidad = new Unidad();
foreach ($unidad->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'idunidad')!==$value['id']): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="number" name="cantidad" id="" min="1" required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'cantidad'); ?>">
</div>
</div>
</div>

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'descripcion'); ?>">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE INICIO</label>
<input type="date" name="fecha_inicio" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_inicio'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>FECHA DE FIN</label>
<input type="date" name="fecha_fin" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_fin'); ?>">
</div>
</div>
</div>

<div class="form-group">
<label>OBSERVACIÓN</label>
<input type="text" name="observacion" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'observacion'); ?>">
</div>

<div class="form-group">
<label>ESTADO</label><br>
<?php if ($objeto->consulta($id,'estado')=='ACTIVO'): ?>
<label class="radio-inline">
<input type="radio" name="estado"  value="ACTIVO" checked> ACTIVO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value="LIQUIDADO"> LIQUIDADO
</label> 
<?php else: ?>
<label class="radio-inline">
<input type="radio" name="estado"  value="ACTIVO" > ACTIVO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value="LIQUIDADO" checked> LIQUIDADO
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