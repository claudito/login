<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   


$articulo_file  =  new Articulo_file();
?>

<?php if (count($articulo_file->lista($id))>0): ?>
<?php foreach ($articulo_file->lista($id) as $key => $value): ?>
<ul>
<li><a href="<?php echo PATH; ?>upload/articulo_file/<?php echo $value['ruta']; ?>" target="_blank"><?php echo $value['nombre']; ?></a></li>
</ul>
<?php endforeach ?>
<?php else: ?>
<p class="alert alert-warning">No hay archivos disponibles</p>
<?php endif ?>
	