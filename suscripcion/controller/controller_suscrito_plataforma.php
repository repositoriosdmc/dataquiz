<?

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "../dao/dao_suscritos_encuesta.php";

$encuesta = new suscritos_dmc();

$encuesta->registrar_plataforma_datos($_POST);


header("location:https://survey.dmc.pe/suscripcion/mensaje_plataforma.php");

?>