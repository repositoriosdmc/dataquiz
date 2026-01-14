	<?
error_reporting(E_ALL);
ini_set('display_errors', '1');

ini_set('max_execution_time', '600'); //300 seconds = 5 minutes
//ini_set('max_execution_time', '0'); // for infinite time of execution
require_once "dao_suscripcion.php";
require_once "dao_mensaje.php";
$suscripcion=new suscripcion();

$mensaje = new mensaje();


/*$talleres = array(1047);

$textTalleres = implode(",",$talleres);

$data = $suscripcion->listado_capacitacion_jarvis($textTalleres);

$correos = $suscripcion->lista_email_ficha_contacto(1047);*/

/*$body = $mensaje->mensajeDMConlineTT($data);*/

$titulo = "Taller Online Gratuito ¿Cuáles es la mejor herramienta de visualización de datos para tu negocio?: Power BI vs Tableau – Link acceso";


//$body = $mensaje->mensajeDMCWorkshopOnline($data);
//$body = $mensaje->recordartorio_mailing();

//$titulo = "¡Hoy! Charla Magistral: Qué hace un científico de datos + PEA Data Science Fundamentals – Link acceso";

/*foreach ($correos as $key => $correo) {

	$enviado=$suscripcion->send_mail($titulo,$correo['ficha_contacto_email'],"","","","",$titulo,$body);

	echo $key."<br>";
	var_dump($enviado)."<br>";

}*/

$body = "Hola";

$enviado=$suscripcion->send_mail($titulo,"carlos.mori@dataminingperu.com","","","","",$titulo,$body);

var_dump($enviado);

/*$enviado=$suscripcion->send_mail($titulo,"joel.lapa@dmc.pe","","","","",$titulo,$body);

$enviado=$suscripcion->send_mail($titulo,"janet.chambi@dmc.pe","","","","",$titulo,$body);*/

echo $body;






?>
