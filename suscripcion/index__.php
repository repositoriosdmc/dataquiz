<?
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once "dao/dao_inscripcion.php";
require_once "dao/Browser.php";
//$curso=inscripcion::listado_curso();
$browser=new Browser();
echo $browser->getBrowser();
echo $browser->getVersion();
echo $browser->getPlatform();
echo $browser->isRobot();

print_r($browser);

?>
