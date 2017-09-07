<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero       =  $_GET['id'];
$requisc      =  new Requisc();
$carpeta      =  "ordenes-compra";

$comovd   =  new Comovd();

?>

<?php if (count($comovd->lista($numero,'OC'))>0): ?>
<form id="detalle">
<input type="hidden" name="numero" value="<?php echo $numero; ?>">
<div class="table-responsive">
	<table class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th>ITEM</th>
				<th>CÓDIGO</th>
				<th>DESCRIPCIÓN</th>
				<th>UND</th>
				<th>CANT</th>
				<th>SALDO</th>
				<th>CC</th>
				<th>OT</th>
				<th class="text-center">PRECIO</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($comovd->lista($numero,'OC') as $key => $value): ?>
		<tr>
		<td><?php echo $value['item']; ?></td>
		<td><?php echo $value['codigo']; ?></td>
		<td><?php echo $value['descripcion']; ?></td>
		<td><?php echo $value['unidad']; ?></td>
		<td><?php echo $value['cantidad']; ?></td>
		<td><?php echo $value['saldo']; ?></td>
		<td><?php echo $value['centro_costo']; ?></td>
		<td><?php echo $value['ot']; ?></td>
		<input type="hidden" name="item[]" value="<?php echo $value['item']; ?>">
		<td ><input type="text" name="precio[]"  value="<?php echo round($value['precio'],2); ?>"  class="text-center"></td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>

<button class="btn btn-primary">Actualizar</button>
</form>

<script>
    $("#detalle").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar_detalle.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          //$('#modal-visualizar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>	


<?php else: ?>
<form id="visualizar">

<input type="hidden" name="orden" value="<?php echo $numero; ?>">


<div class="form-group">
<label>REQUERIMIENTO</label>
<select name="requerimiento" id="" class="form-control" required="">
<option value="">[ Seleccionar ]</option>
<?php foreach ($requisc->lista_ordenes('RQ') as $key => $value): ?>
<option value="<?php echo $value['numero']; ?>"><?php echo $value['numero'].' - '.$value['centro_costo'].' - '.$value['ot']; ?></option>
<?php endforeach ?>
</select>
</div>


<button class="btn btn-primary">Transferir</button>
</form>

<script>
    $("#visualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/visualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#modal-visualizar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>	
<?php endif ?>




