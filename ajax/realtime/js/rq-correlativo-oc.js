
function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/rq-correlativo-oc.php');
}

setInterval('actualiza_contenido()', 1000 );
