<?php 
include'../autoload.php';
include'../session.php';
$assets   = new Assets();
$html     = new Html();
$assets   ->principal('Aprobación de Documentos');
$assets   ->sweetalert();
$assets   ->datatables();
$html->header();
$carpeta = "aprobacion-documentos";

include'../vista/modal/'.$carpeta.'/buscar.php';

 ?>

<div class="row">
<div class="col-md-12">
<?php include('../vista/nav.php'); ?>
</div>
</div>






<div class="row">
<div class="col-md-12">

<div class="pull-right">
<a data-toggle="modal" href="#modal-buscar" class="btn btn-primary"><i class="fa fa-search"></i>  Buscar Documentos</a>
</div>



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


