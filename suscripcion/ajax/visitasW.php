<?php
session_start();

require_once "../dao/dao_suscripcion.php";

$suscripcion = new suscripcion();

$fecha = date("Y-m-d");

if($_SESSION["sfecha"]!=$fecha){

	$ip = $suscripcion->getIp();

	$_SESSION["sfecha"] = $fecha;

	$id = $suscripcion->registrar_visita($_POST["dispositivo"],$_POST["navegador"],$_POST["so"],$_POST["url"],$ip,$_POST["capacitacion_id"]);

	echo $id;

}else{

	echo json_encode(false);

}

?>