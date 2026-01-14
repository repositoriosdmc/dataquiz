<?php


/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

session_start();

require_once "../dao/dao_persona.php";

$persona = new persona();

$_SESSION["scantidad"]=+1;

if($_SESSION["scantidad"]<3){
	$persona->registrar_embajador($_POST);
}


$_SESSION["smensaje"]=1;

header("location:../sorteo.php");

?>