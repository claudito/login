
function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/rq-correlativo-rs.php');
}

setInterval('actualiza_contenido()', 1000 );
