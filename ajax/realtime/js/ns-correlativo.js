
function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/ns-correlativo.php');
}

setInterval('actualiza_contenido()', 1000 );
