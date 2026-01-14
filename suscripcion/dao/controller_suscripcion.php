<?
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once "../dao/dao_suscripcion.php";
require_once "../dao/Browser.php";
$browser=new Browser();
$suscripcion= new suscripcion();
if(count($_POST)>0){
	$_POST["browser"]=$browser->getBrowser();
	$_POST["version"]=$browser->getVersion();
	$_POST["so"]=$browser->getPlatform();
	$_POST["check_mail"]=1;
	$_POST["tipo"]=1;

	if($_POST["redirect"]<=3){
		$_POST["cursos"] = explode(",", $_POST["cursos"]);
	}


	$suscripcion=$suscripcion->ficha_contacto($_POST);



	if($suscripcion===true){
		$mensaje="Por favor, revisar tu bandeja de entrada o tu spam para encontrar la información solicitada.";
	}else if($suscripcion===false){
		$mensaje="En breve momentos nos contactaremos";
	}

	$_SESSION["mensaje"]=$mensaje;

}

$capacitacion = str_replace("&", " | ", $_POST["nomCapacitacion"]);

//var_dump($suscripcion);

if($_POST["redirect"]==1){

	$url = "?celular=".$_POST["celVendedor"]."&capacitacion=".str_replace(' ','%20',trim($capacitacion));

	header("location:https://certificaciones.dmc.pe/suscripcion/gracias.php".$url);



}elseif($_POST["redirect"]==2){

	$url = "?celular=".$_POST["celVendedor"]."&capacitacion=".str_replace(' ','%20',trim($capacitacion));

	header("location:https://certificaciones.dmc.pe/suscripcion/gracias-summit.php".$url);

}elseif($_POST["redirect"]==3){

	$url = "?celular=".$_POST["celVendedor"]."&capacitacion=".str_replace(' ','%20',trim($capacitacion));

	header("location:https://certificaciones.dmc.pe/suscripcion/gracias-summit-one-day.php".$url);

}elseif($_POST["redirect"]==4){

	header("location:https://certificaciones.dmc.pe/suscripcion/gracias-summit-invitado.php");

}else{
	header("location:https://dmc.pe/mensaje-enviado/");
}


?>
