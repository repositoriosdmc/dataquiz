<?

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once  "dao_mensajedmc.php";
require_once  "dao_suscripcion.php";

$mensaje = new mensajeDMC();

$suscripcion = new suscripcion();

$capacitacion = $suscripcion->listado_capacitacion_jarvis("897,1069,1114,1117,1108,1109");

foreach($capacitacion as $data){

    echo $mensaje->plantilla_correo($data);

}



?>