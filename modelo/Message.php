<?php 

class Message
{


function __construct()
{

}


function mensaje($titulo,$tipo,$texto,$tiempo)
{

return  '<script>
		swal({
		title: "'.$titulo.'",
		type:"'.$tipo.'",
		text: "'.$texto.'",
		timer: '.$tiempo.'000,
		showConfirmButton: false
		});
        </script>';

}




}



 ?>