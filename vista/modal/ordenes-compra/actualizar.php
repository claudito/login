<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   

$objeto   =  new Comovc();

$carpeta  =  "ordenes-compra";

 ?>

<?php if (count($objeto->consulta($id,'id','OC'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="numero" value="<?php echo $id; ?>">
<input type="hidden" name="tipo"   value="<?php echo $objeto->consulta($id,'tipo','OC'); ?>">

<div class="form-group">
  <label>PROVEEDOR</label>
  <select name="id_proveedor" id="" class="form-control" required="">
    <option value="<?php echo $objeto->consulta($id,'idproveedor','OC'); ?>"><?php echo $objeto->consulta($id,'proveedor','OC') ?></option>
      <?php 
      $proveedor = new Proveedor();
      foreach ($proveedor->lista() as $key => $value): ?>
        <?php if ($objeto->consulta($id,'proveedor','OC')!==$value['id']): ?>
        <option value="<?php echo $value['id']; ?>"><?php echo $value['contacto']; ?></option>
        <?php endif ?>
      <?php endforeach ?>
  </select>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE INICIO</label>
<input type="date" name="fecha_inicio" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_inicio','OC'); ?>" >
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE FIN</label>
<input type="date" name="fecha_fin" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_fin','OC'); ?>" >
</div>
</div>
</div>

<div class="form-group">
<label>COMENTARIO</label>
<input type="text" name="comentario" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'comentario','OC'); ?>" >
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CENTRO DE COSTO</label>
<select name="centro_costo" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'codigo_centrocosto','OC') ?>"><?php echo $objeto->consulta($id,'centro_costo','OC') ?></option>
<?php 
$centro_costo = new Centro_costo();
foreach ($centro_costo->lista() as $key => $value): ?>
  <?php if ($objeto->consulta($id,'centro_costo','OC')!==$value['id']): ?>
  <option value="<?php echo $value['codigo']; ?>"><?php echo $value['descripcion']; ?></option>
  <?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
<label>ORDEN DE TRABAJO</label>
<select name="ot" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'codigo_ot','OC') ?>"><?php echo $objeto->consulta($id,'codigo_ot','OC'); ?></option>
<?php 
$orden_trabajo = new Orden_trabajo();
foreach ($orden_trabajo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo_ot','OC')!==$value['codigo']): ?>
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
<option value="<?php echo $objeto->consulta($id,'areacodigo','OC'); ?>"><?php echo $objeto->consulta($id,'area','OC') ?></option>
<?php 
$area = new Area();
foreach ($area->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'area')!==$value['id']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>


<div class="form-group">
  <label>PRIORIDAD</label><br>
  <?php 

  switch ($objeto->consulta($id,'prioridad','OC')) {
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
<?php if ($objeto->consulta($id,'estado','OC')==00): ?>
<label class="radio-inline">
<input type="radio" name="estado"  value= 00 checked> EMITIDO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 01> APROBADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 02> PARCIAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 03> TOTAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 04> LIQUIDADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 05> ANULADO
</label>
<?php elseif ($objeto->consulta($id,'estado','OC')==01): ?>
<label class="radio-inline">
<input type="radio" name="estado"  value= 00> EMITIDO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 01 checked> APROBADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 02> PARCIAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 03> TOTAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 04> LIQUIDADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 05> ANULADO
<?php elseif ($objeto->consulta($id,'estado','OC')==02): ?>
<label class="radio-inline">
<input type="radio" name="estado"  value= 00> EMITIDO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 01> APROBADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 02 checked> PARCIAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 03> TOTAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 04> LIQUIDADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 05> ANULADO
<?php elseif ($objeto->consulta($id,'estado','OC')==03): ?>
<label class="radio-inline">
<input type="radio" name="estado"  value= 00> EMITIDO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 01> APROBADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 02> PARCIAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 03 checked> TOTAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 04> LIQUIDADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 05> ANULADO
<?php elseif ($objeto->consulta($id,'estado','OC')==04): ?>
<label class="radio-inline">
<input type="radio" name="estado"  value= 00> EMITIDO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 01 checked> APROBADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 02> PARCIAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 03> TOTAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 04 checked> LIQUIDADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 05> ANULADO
<?php elseif ($objeto->consulta($id,'estado','OC')==05): ?>
<label class="radio-inline">
<input type="radio" name="estado"  value= 00 > EMITIDO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 01 checked> APROBADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 02> PARCIAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 03> TOTAL
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 04> LIQUIDADO
</label>
<label class="radio-inline">
<input type="radio" name="estado"  value= 05 checked> ANULADO
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