<?php 


class Funciones
{


function __construct()
{

}


function validar_xss($cadena)
{
	$cadena = htmlspecialchars(trim($cadena), ENT_QUOTES,'UTF-8');
	return $cadena;
}



function tipo_archivo($tipo)
{

   switch ($tipo) {
   	case 'image/png':
   		return "ok";
   		break;
   	case 'image/jpeg':
   		return "ok";
   		break;
   	case 'image/gif':
   		return "ok";
   		break;
   	case 'text/plain':
   		return "ok";
   		break;
   	case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
   		return "ok";
   		break;
   	case 'application/msword':
   		return "ok";
   		break;
   	case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
   		return "ok";
   		break;
   	case 'application/vnd.ms-excel':
   		return "ok";
   		break;
   	case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
   		return "ok";
   		break;
   	case 'application/vnd.ms-powerpoint':
   		return "ok";
   		break;
   	case 'application/pdf':
   		return "ok";
   		break;
   	default:
   		return "error";
   		break;
   }


}


function tipo_extension($tipo)
{

   switch ($tipo) {
      case 'image/png':
         return "png";
         break;
      case 'image/jpeg':
         return "jpg";
         break;
      case 'image/gif':
         return "gif";
         break;
      case 'text/plain':
         return "txt";
         break;
      case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
         return "docx";
         break;
      case 'application/msword':
         return "doc";
         break;
      case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
         return "xlsx";
         break;
      case 'application/vnd.ms-excel':
         return "xls";
         break;
      case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
         return "pptx";
         break;
      case 'application/vnd.ms-powerpoint':
         return "ppt";
         break;
      case 'application/pdf':
         return "pdf";
         break;
      default:
         return "error";
         break;
   }


}


}


 ?>