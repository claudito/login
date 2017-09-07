<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];

$objeto = new Comovc();
$carpeta = "ordenes-servicio";

echo $id;
?>

<?php if (count($objeto->consulta($id,$tipo,'id','OS'))>0): ?>

<form role="form" id="visualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>REQUERIMIENTO</label>
<select name="rq-servicio" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$requisc = new Requisc();
foreach ($requisc->lista('RS') as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['numero'].' - '.$value['centro_costo'].' - '.$value['codigo_ot']; ?></option>
<?php endforeach ?>
</select>
</div>
</form>

<script>
    $("#visualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type:"POST",
          url: "../controlador/<?php echo $carpeta; ?>/visualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#visualizar")[0].reset();  //resetear inputs
          $('#requestModal').modal('hide'); //ocultar modal
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