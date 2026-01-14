	<?
/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/
require_once "dao_suscripcion.php";
require_once "dao_mensaje.php";
$suscripcion=new suscripcion();

$mensaje = new mensaje();


$talleres = array(949);

$textTalleres = implode(",",$talleres);

$data = $suscripcion->listado_capacitacion_jarvis($textTalleres);

$correos = $suscripcion->lista_email_ficha_contacto(949);

/*$body = $mensaje->mensajeDMConlineTT($data);*/

/*$titulo = "Taller Online Gratuito Modelos Logísticos con enlaces asimétricos en R. – Link acceso";*/

$body = $mensaje->mensajeDMCWorkshopOnline($data);

$titulo = "Taller Online Gratuito de Aplicaciones de Machine Learning en Banca – Link acceso";

foreach ($correos as $key => $correo) {

	$enviado=$suscripcion->send_mail($titulo,$correo['ficha_contacto_email'],"","","","",$titulo,$body);

	echo $key."<br>";

}

//$enviado=$suscripcion->send_mail($titulo,"asistente.academico@dmc.pe","","","","",$titulo,$body);

/*$enviado=$suscripcion->send_mail($titulo,"joel.lapa@dmc.pe","","","","",$titulo,$body);

$enviado=$suscripcion->send_mail($titulo,"janet.chambi@dmc.pe","","","","",$titulo,$body);*/

echo $body;






?>