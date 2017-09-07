<?php 
include'../autoload.php';
include'../session.php';
$assets   = new Assets();
$html     = new Html();
$assets   ->principal('Requerimiento de Compra');
$assets   ->sweetalert();
$assets   ->datatables();
$html->header();
$carpeta = "rq-compra";?>
<style>table{font-size: 10px;}</style>
<?php
include'../vista/modal/'.$carpeta.'/agregar.php';
include'../vista/modal/'.$carpeta.'/eliminar.php';
 ?>


<div class="row">
<div class="col-md-12">
<?php include('../vista/nav.php'); ?>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="pull-right">
<a data-toggle="modal" href="#newModal" class="btn btn-primary"><i class="fa fa-plus"></i>  Crear Requerimiento de Compra</a>
</div>


<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>

<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>
<script src="../ajax/realtime/js/rq-correlativo.js"></script>

<script> 
loadTabla(1); 
</script>
<?php $html -> footer(); ?>


