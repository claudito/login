
function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/gs-correlativo.php');
}

setInterval('actualiza_contenido()', 1000 );
