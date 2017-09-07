<?php 
$assets   = new Assets();
$html     = new Html();
$message  = new Message();
$assets ->principal('Bienvenidos');
$assets ->sweetalert();
$html->header();

echo  (isset($_GET['ok'])) ? $message->mensaje("Bienvenido","success",$_SESSION[KEY.NOMBRES],2) : "" ;

 ?>

<div class="row">
<div class="col-md-12">
<?php include('nav.php'); ?>
</div>
</div>


<div class="row">
<div class="col-md-12">
<div class="jumbotron">
	<div class="container">
		<h1>Haro Ingenieros</h1>
		<p>Aplicación de Compras</p>
		<p>
			<a class="btn btn-primary btn-lg">Mas información...</a>
		</p>
	</div>
</div>
</div>
</div>

<?php $html -> footer(); ?>