<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   

$objeto   =  new Maquina();

$carpeta  =  "maquina";

 ?>

<?php if (count($objeto->consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

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
<label>FECHA DE ADQUISICIÓN</label>
<input type="date" name="fecha_adquisicion" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_adquisicion'); ?>">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE INICIO</label>
<input type="date" name="fecha_inicio" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_inicio'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>FECHA DE TÉRMINO</label>
<input type="date" name="fecha_termino" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_termino'); ?>">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="number" name="cantidad" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'cantidad'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>FACTURA DE CONTRATO</label>
<input type="text" name="contrato_factura" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'contrato_factura'); ?>">
</div>
</div>
</div>

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'descripcion'); ?>">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>DESCRIPCIÓN ABREVIADA</label>
<input type="text" name="descripcion_abrv" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'descripcion_abrv'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>MODELO</label>
<input type="text" name="modelo" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'modelo'); ?>">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>SERIE</label>
<input type="text" name="serie" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'serie'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>MARCA</label>
<input type="text" name="marca" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'marca'); ?>">
</div>
</div>
</div>

<div class="form-group">
<label>ESTADO</label><br>
<?php if ($objeto->consulta($id,'estado')=='ACTIVO'): ?>
<label class="radio-inline">
<input type="radio" name="estado"  value="ACTIVO" checked> ACTIVO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value="INACTIVO"> INACTIVO
</label> 
<?php else: ?>
<label class="radio-inline">
<input type="radio" name="estado"  value="ACTIVO" > ACTIVO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value="INACTIVO" checked> INACTIVO
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