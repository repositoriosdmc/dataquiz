<?

error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "../dao/dao_suscritos_encuesta.php";

$encuesta = new suscritos_dmc();

$encuesta->registrar_proceso_encuesta_kayrus($_POST);


header("location:https://certificaciones.dmc.pe/suscripcion/mensaje_evento.php?concurso=".$_POST["curso"]);

?>