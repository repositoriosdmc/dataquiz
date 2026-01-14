<?
require_once "../dao/dao_suscripcion.php";
$inscripcion=new inscripcion();
echo json_encode( $inscripcion->validar_dni($_POST['dni']) );


?>