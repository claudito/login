<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   

$objeto   =  new Articulo_file();

$carpeta  =  "articulo_file";

 ?>

<?php if (count($objeto->consulta($id,'id'))>0): ?>

	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Archivos Permitidos:</strong> .JPG, .PNG, .GIF, .DOCX, .DOC, .XLSX, .XLS, .PPTX, .PPT, .PDF, .TXT
	</div>

<form role="form" id="actualizar"  enctype="multipart/form-data" method="POST">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>NOMBRE</label>
<input type="text" name="nombre" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'nombre'); ?>" autocomplete="OFF">
</div>

<div class="form-group">
  <label>ARCHIVO</label>
  <input type="file" name="archivo" id="" class="form-control" required=""> 
</div>


<button class="btn btn-primary">Subir Archivo</button>

</form>

<script>

$(function(){
$("#actualizar").on("submit", function(e){
e.preventDefault();
var f = $(this);
var formData = new FormData(document.getElementById("actualizar"));
formData.append("dato", "valor");

$.ajax({
url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
type: "post",
dataType: "html",
data: formData,
cache: false,
contentType: false,
processData: false
})
.done(function(res){
    $("#mensaje").html(res);
    $('#editModal').modal('hide');  // ocultar modal
    $('body').removeClass('modal-open');
    $("body").removeAttr("style");
    $('.modal-backdrop').remove();
    loadTabla(1);
});
});
});

</script>


<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>