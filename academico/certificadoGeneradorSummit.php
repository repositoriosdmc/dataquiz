<?php 

/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

require_once "dao_certificado_summit.php";

$certificado = new certificadoPDF();

$certificado->generar_certificado($_GET["codigo"],$_GET["nombre"],$_GET["apellidos"],$_GET["capacitacion"],$_GET["horas"],$_GET["notas"],$_GET["fechaFin"],$_GET["tipo"],$_GET["fechaIni"],$_GET["documento"]);




 ?>




