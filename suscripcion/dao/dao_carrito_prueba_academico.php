<?
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "dao_mail.php";


$request = file_get_contents('php://input');


function procesoRegistro($request)
{

    $correo = 'marco.medrano@dataminingperu.com';

    $mensajePost = var_export($request, true);

    $req_dump = print_r($request, true);

    $json_data = file_put_contents('request.log', $req_dump);

    $action = var_export($json_data, true);

    $mail = new mail();

    $pagos = null;

    $json = json_decode($request, true);

    $data = $json;

    $mail->send_mail("Informes DMC", $correo, "DMC", "", "", "", 'Prueba POST ACADEMICO', $mensajePost);

    //$mail->send_mail("Informes DMC",$correo,"DMC","","","",'Array Id',$data["billing"]["first_name"]);

    //$mail->send_mail("Informes DMC",$correo,"DMC","","","",'Array Mensaje',var_export($data,true));








    return $mensajePost;
}





//procesoRegistro($request);








$curl = curl_init();

// URL de la API de Moodle
$url = 'https://aulavirtualdmc.com/learning/webservice/rest/server.php';

// Datos a enviar en el cuerpo de la solicitud
$postData = array(
    'wstoken' => 'bd43693c62e4482a895bc6ac86f2c6a6',
    'moodlewsrestformat' => 'json',
    'wsfunction' => 'core_user_get_users',
    'criteria[0][key]' => 'id',
    'criteria[0][value]' => 8,
);

// Configurar opciones de cURL
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => http_build_query($postData),  // Enviar datos en el cuerpo de la solicitud
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/x-www-form-urlencoded',
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;




//var_dump(lista_pago_id(3418));
