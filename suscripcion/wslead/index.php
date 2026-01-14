<?
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	require_once "../dao/dao_suscripcion.php";

	$suscripcion= new suscripcion();

	$id=$suscripcion->registrar_ficha_contacto($_POST);
	
	$status = $id >0 ? true : false; 
	
	return $status;

	exit();	
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>