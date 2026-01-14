<?php
 error_reporting(E_ALL);
 ini_set('display_errors', '1');
/* Muestra la sesión*/
session_start();
 
/* Debemos modificar segun el directorio de instalación*/
require_once  'facebook/src/Facebook/autoload.php';
 
$fb = new Facebook\Facebook([
  'app_id' => '892675224998088',
  'app_secret' => '42d896e08af9d242c048a04ff12f3eae',
  'default_graph_version' => 'v2.4',
]);
  
$helper = $fb->getRedirectLoginHelper();
  
$permissions = ['email']; // Generar permisos opcionales
$loginUrl = $helper->getLoginUrl('https://certificaciones.dmc.pe/suscripcion/Facebook/fb-callback.php', $permissions);
  
/* Aquí el enlace a la página de login Facebook*/
echo '<a href="'. htmlspecialchars($loginUrl) . '">Iniciar sesión con Facebook!</a>';
 
?>