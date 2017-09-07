<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   


$objeto   =  new Requisc();

$carpeta  =  "rq-compra";

 ?>

<?php if (count($objeto->consulta($id,'id','RS'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="tipo" value="<?php echo $objeto->consulta($id,'tipo','RS'); ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE INICIO</label>
<input type="date" name="fecha_inicio" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_inicio','RS'); ?>">
</div>  
</div>
<div class="col-md-6">
 <div class="form-group">
<label>FECHA DE FIN</label>
<input type="date" name="fecha_fin" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_fin','RS'); ?>">
</div> 
</div>
</div>

<div class="form-group">
<label>COMENTARIO</label>
<input type="text" name="comentario" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'comentario','RS'); ?>">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CENTRO DE COSTO</label>
<select name="centro_costo" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'codigo_cc','RS'); ?>"><?php echo $objeto->consulta($id,'codigo_cc','RS').' - '.$objeto->consulta($id,'centro_costo','RS') ?></option>
<?php 
$centro_costo = new Centro_costo();
foreach ($centro_costo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo_cc','RS')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div> 
</div>
<div class="col-md-6">
<div class="form-group">
<label>ORDEN DE TRABAJO</label>
<select name="ot" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'codigo_ot','RS') ?>"><?php echo $objeto->consulta($id,'codigo_ot','RS'); ?></option>
<?php 
$orden_trabajo = new Orden_trabajo();
foreach ($orden_trabajo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo_ot','RS')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>  
</div>
</div>

<div class="form-group">
<label>ÁREA</label>
<select name="area" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'codigo_area','RS'); ?>"><?php echo $objeto->consulta($id,'codigo_area','RS').' - '.$objeto->consulta($id,'area','RS') ?></option>
<?php 
$area = new Area();
foreach ($area->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo_area','RS')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>


<div class="form-group">
  <label>PRIORIDAD</label><br>
  <?php 

  switch ($objeto->consulta($id,'prioridad','RS')) {
    case '1':
     echo '<label class="radio-inline">
          <input type="radio" name="prioridad" id="inlineRadio1" value="1" checked> BAJA
          </label>
          <label class="radio-inline">
          <input type="radio" name="prioridad" id="inlineRadio2" value="2"> MEDIA
          </label>
          <label class="radio-inline">
          <input type="radio" name="prioridad" id="inlineRadio3" value="3"> ALTA
          </label>';
 break;
 case '2':
     echo '<label class="radio-inline">
          <input type="radio" name="prioridad" id="inlineRadio1" value="1"> BAJA
          </label>
          <label class="radio-inline">
          <input type="radio" name="prioridad" id="inlineRadio2" value="2" checked> MEDIA
          </label>
          <label class="radio-inline">
          <input type="radio" name="prioridad" id="inlineRadio3" value="3"> ALTA
          </label>';
 break;
 case '3':
     echo '<label class="radio-inline">
          <input type="radio" name="prioridad" id="inlineRadio1" value="1"> BAJA
          </label>
          <label class="radio-inline">
          <input type="radio" name="prioridad" id="inlineRadio2" value="2"> MEDIA
          </label>
          <label class="radio-inline">
          <input type="radio" name="prioridad" id="inlineRadio3" value="3" checked> ALTA
          </label>';
      break;
    
    default:
echo "no existe";
      break;
  }

   ?>
</div>

<div class="form-group">
<label>ESTADO</label><br>
<?php if ($objeto->consulta($id,'estado','RS')=='P'): ?>
   <label class="radio-inline">
    <input type="radio" name="estado"  value="P" checked> PENDIENTE
  </label>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="A"> ATENDIDO
</label> 
<?php else: ?>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="P" > PENDIENTE
  </label>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="A" checked> ATENDIDO
  </label>
<?php endif ?>
</div>

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