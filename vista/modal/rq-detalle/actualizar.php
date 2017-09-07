<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];
$requisd  =  new Requisd();
$carpeta  =  "rq-detalle";

?>

<form id="actualizar" autocomplete="off">
 	
<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" class="form-control" value="<?php echo $requisd->consulta($id,'codigo_articulo').' - '.$requisd->consulta($id,'descripcion_articulo'); ?>" readonly>
</div>


<div class="form-group">
<label>CANTIDAD</label>
<input type="number" step="any" name="cantidad" id="" class="form-control" required="" min="0.00" 
 value="<?php echo round($requisd->consulta($id,'cantidad'),2); ?>">
</div>

<div class="form-group">
<label>SALDO</label>
<input type="number" step="any" name="saldo" id="" class="form-control" required="" min="0.00" 
 value="<?php echo round($requisd->consulta($id,'saldo'),2); ?>">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CENTRO DE COSTO</label>
<select name="centro_costo" id="" class="form-control" required="">
<option value="<?php echo $requisd->consulta($id,'codigo_cc','RQ') ?>"><?php echo $requisd->consulta($id,'centro_costo','RQ') ?></option>
<?php 
$centro_costo = new Centro_costo();
foreach ($centro_costo->lista() as $key => $value): ?>
<?php if ($requisd->consulta($id,'centro_costo','RQ')!==$value['id']): ?>
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
<option value="<?php echo $requisd->consulta($id,'codigo_ot','RQ') ?>"><?php echo $requisd->consulta($id,'codigo_ot','RQ'); ?></option>
<?php 
$orden_trabajo = new Orden_trabajo();
foreach ($orden_trabajo->lista() as $key => $value): ?>
<?php if ($requisd->consulta($id,'codigo_ot','RQ')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div> 
</div>
</div>

<div class="form-group">
<label>COMENTARIO</label>
<input type="text" name="comentario" id="" class="form-control" required=""  onchange="Mayusculas(this)"  value="<?php echo $requisd->consulta($id,'comentario'); ?>">
</div>


<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $id; ?>">


<button type="submit" class="btn btn-primary">Actualizar</button>


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
          loadTabla(1,<?php echo $requisd->consulta($id,'numero'); ?>);
          }
      });
  });
</script>