<?
/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/
require_once "../dao/dao_suscripcion.php";
session_start();
$suscripcion=new suscripcion();
//var_dump($suscripcion);

$_POST["datos"] = $_POST["datos"] ? $_POST["datos"] : 0;


$status=false;

if ($_POST["cursos"][0]=="362"){

	$estado_mail=$suscripcion->validar_email_concurso($_POST["correo"]); 

	if($estado_mail=="0"){

		$_POST["tipo"]=1;

		$status=$suscripcion->ficha_contacto($_POST);

	}
    
}else if(isset($_POST["cursos"])==null){

	$suscripcion->registrar_ficha_contacto($_POST);

}else{
	
	if ($_POST["universidad"]!="") {

		$_POST["mensaje"]=$_POST["calificacion"]."|".implode(",",$_POST["curso"]);

		$_POST["centro_trabajo"]=$_POST["universidad"];

		$_POST["atendido"]=0;

	}

    $_POST["atendido"]=0;

	$status=$suscripcion->ficha_contacto($_POST);

	

}

if($status===true){

	$suscripcion->actualizar_fecha_inicio();

}
//var_dump($_POST);


$_SESSION["sredict"]="OK";
if($_POST["tt"]==1){
	header("location:http://dmc.pe/mensaje-enviado/");

}else{
if ($_POST["cursos"][0]==119) {
	header("location:http://survey.dmc.pe/suscripcion/concurso_mensaje.php");
}elseif ($_POST["cursos"][0]=="362"){
	$_SESSION["smensaje"]="OK";
	header("location:http://bigdatasummit.pe/BDAS2019/");
}elseif ($_POST["cursos"][0]=="362"){
	$_SESSION["smensaje"]="OK";
	header("location:http://bigdatasummit.pe/BDAS2019/");
}elseif ($_POST["cursos"][0]=="465") {
	$_SESSION["smensaje"]="OK";
	header("location:https://survey.dmc.pe/suscripcion/msj.php");
}elseif ($_POST["universidad"]!="") {
	$_SESSION["smensaje"]="OK";

	header("location:https://survey.dmc.pe/suscripcion/universitario.php?uni=".$_POST["cursos"][0]);
}else{
	header("location:https://survey.dmc.pe/suscripcion/suscritos_dmc.php");
}
}
?>