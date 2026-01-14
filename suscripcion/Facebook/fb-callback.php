<?php
 error_reporting(E_ALL);
 ini_set('display_errors', '1');
//Cargar la sesión
session_start();


 
// Cambiar de acuerdo donde hemos instalado el script
require_once 'facebook/src/Facebook/autoload.php';
 
$fb = new Facebook\Facebook([
  'app_id' => '892675224998088',
  'app_secret' => '42d896e08af9d242c048a04ff12f3eae',
  'default_graph_version' => 'v2.4',
]);
   
$helper = $fb->getRedirectLoginHelper(); 
   
try { 
  $accessToken = $helper->getAccessToken(); 
} catch(Facebook\Exceptions\FacebookResponseException $e) { 
  // Cuando Graph devuelve un error
  echo 'Graph returned an error: ' . $e->getMessage(); 
  exit; 
} catch(Facebook\Exceptions\FacebookSDKException $e) { 
  // Cuando la validación falla 
  echo 'Facebook SDK returned an error: ' . $e->getMessage(); 
  exit; 
} 
 
if (! isset($accessToken)) { 
  if ($helper->getError()) { 
    header('HTTP/1.0 401 Unauthorized'); 
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else { 
    header('HTTP/1.0 400 Bad Request'); 
    echo 'Bad request'; 
  } 
  exit; 
} 
 
// Login directo 
echo '<h3>Acceso Token</h3>'; 
var_dump($accessToken->getValue()); 
   
// Controlador de cliente de OAuth 2.0, para gestionar los accesos
$oAuth2Client = $fb->getOAuth2Client(); 
   
$tokenMetadata = $oAuth2Client->debugToken($accessToken); 
echo '<h3>Metadata</h3>'; 
var_dump($tokenMetadata); 
   
$tokenMetadata->validateExpiration();  
    
if (! $accessToken->isLongLived()) { 
  // Cambiando uno de corta duración a una de larga duración
  try { 
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken); 
  } catch (Facebook\Exceptions\FacebookSDKException $e) { 
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>"; 
    exit; 
  }
  echo '<h3>Long-lived</h3>'; 
  var_dump($accessToken->getValue()); 
}
 
$_SESSION['fb_access_token'] = (string) $accessToken; 
   
?>