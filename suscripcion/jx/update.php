<?
require_once "../dao/dao_inscripcion.php";
echo inscripcion::registro_actividad($_POST['id'],$_POST['medio'],$_POST['fecha_registro'],$_POST['comentarios']);

?>
