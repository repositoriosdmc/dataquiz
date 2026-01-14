<?
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "../dao/dao_suscripcion.php";
$inscripcion=new suscripcion();
echo json_encode( $inscripcion->charla_informativa_validacion($_POST['correo'],$_POST['pea']) );


?>