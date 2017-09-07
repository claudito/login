<?php 
include'../autoload.php';
include'../session.php';
$assets   = new Assets();
$html     = new Html();
$assets   ->principal('Artículos - Archivos');
$assets   ->sweetalert();
$assets   ->datatables();
$html->header();
$carpeta = "articulo_file";

 ?>

<div class="row">
<div class="col-md-12">
<?php include('../vista/nav.php'); ?>
</div>
</div>






<div class="row">
<div class="col-md-12">





<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>

<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>
<script> 
loadTabla(1); 
</script>
<?php $html -> footer(); ?>


