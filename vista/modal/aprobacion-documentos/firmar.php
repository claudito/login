<?php 

include'../../../autoload.php';
include'../../../session.php';
$numero                = $_GET['numero']; 
$tipo                  = $_GET['tipo'];  
$usuario               = $_SESSION[KEY.ID];
$usuario_tipo          = new Usuario_tipo();
$aprobacion_documentos = new Aprobacion_documentos($numero,$tipo);
$carpeta               = "aprobacion-documentos"; 
?>

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Firmar Documento <i class="fa fa-pencil"></i></h4>
</div>
<div class="modal-body">
<form id="firmar">

<?php if ($tipo=='RQ' || $tipo=='RS'): ?>

<input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
<input type="hidden" name="numero" value="<?php echo $numero; ?>">

<table class="table table-condensed table-bordered">
<tr class="active">
<th class="text-center">SOLICITANTE</th>
<th class="text-center">JEFE DE ÁREA</th>
<th class="text-center">ENCARGADO DE COMPRAS</th>
</tr>
<tr>
<td class="text-center"><input type="checkbox" name="firma_1" id="" class="form-control input-sm" 
 <?php echo ($usuario_tipo->consulta($usuario,'solicitante')==0) ? "disabled" : "" ; ?>
 <?php echo ($aprobacion_documentos->consulta('firma_1')==1) ? "checked" : "" ; ?> ></td>
<td class="text-center"><input type="checkbox" name="firma_2" id="" class="form-control input-sm"
 <?php echo ($usuario_tipo->consulta($usuario,'jefe_area')==0) ? "disabled" : "" ; ?>
 <?php echo ($aprobacion_documentos->consulta('firma_2')==1) ? "checked" : "" ; ?> ></td>
<td class="text-center"><input type="checkbox" name="firma_3" id="" class="form-control input-sm"
 <?php echo ($usuario_tipo->consulta($usuario,'compras')==0) ? "disabled" : "" ; ?>
 <?php echo ($aprobacion_documentos->consulta('firma_3')==1) ? "checked" : "" ; ?>
 ></td>
</tr>

</table>

<?php else: ?>

<input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
<input type="hidden" name="numero" value="<?php echo $numero; ?>">		

<table class="table table-condensed table-bordered">
<tr class="active">
<th class="text-center">GERENTE #1</th>
<th class="text-center">GERENTE #2</th>
<th class="text-center">ENCARGADO DE COMPRAS</th>
</tr>
<tr>
<td class="text-center"><input type="checkbox" name="firma_1" id="" class="form-control input-sm" 
 <?php echo ($usuario_tipo->consulta($usuario,'gerente')==0) ? "disabled" : "" ; ?>
 <?php echo ($aprobacion_documentos->consulta('firma_1')==1) ? "checked" : "" ; ?>
  ></td>
<td class="text-center"><input type="checkbox" name="firma_2" id="" class="form-control input-sm"
 <?php echo ($usuario_tipo->consulta($usuario,'gerente')==0) ? "disabled" : "" ; ?>
 <?php echo ($aprobacion_documentos->consulta('firma_2')==1) ? "checked" : "" ; ?>
 ></td>
<td class="text-center"><input type="checkbox" name="firma_3" id="" class="form-control input-sm"
 <?php echo ($usuario_tipo->consulta($usuario,'compras')==0) ? "disabled" : "" ; ?>
 <?php echo ($aprobacion_documentos->consulta('firma_3')==1) ? "checked" : "" ; ?>
 ></td>
</tr>
</table>

<?php endif ?>

<button type="submit" class="btn btn-default">Firmar <i class="fa fa-pencil"></i></button>

</form>


</div>



<script>
    $("#firmar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/firmar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#moda-firmar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>