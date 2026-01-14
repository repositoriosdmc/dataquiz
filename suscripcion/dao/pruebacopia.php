	<?
/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/

ini_set('max_execution_time', '3600'); //300 seconds = 5 minutes
//ini_set('max_execution_time', '0'); // for infinite time of execution 
require_once "dao_suscripcion.php";
require_once "dao_mensaje.php";
$suscripcion=new suscripcion();

$mensaje = new mensaje();




$body = $mensaje->mensaje_bi();


echo $body;






?>