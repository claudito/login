<?php 


$session = new Session();

if (!$session->existe()=='existe') 
{
 
header('Location: '.PATH.'');
    
}



?>
