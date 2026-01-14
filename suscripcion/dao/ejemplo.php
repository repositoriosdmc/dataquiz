<?php

// Configurar las credenciales de la API
$api_key = "87CDB95F-F004-4425-B758-CAA84884A3A5";
$username = "dmcperu";

// ID del correo electrónico que deseas obtener
$id = 23179024;



// Crear la URL de la solicitud
//$url = "https://clientapi.benchmarkemail.com/Emails/" . $id;

$url = "https://clientapi.benchmarkemail.com/Emails/" . $id . "/Preview?EmailAddress=informes@dataminingperu.com";
// Configurar las opciones de curl
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_HTTPHEADER => array(
        "AuthToken: $api_key",
        "Content-Type: application/json"
    ),
    CURLOPT_CUSTOMREQUEST => "GET"
));

// Ejecutar la solicitud y almacenar la respuesta
$response = curl_exec($curl);
// Verificar si se obtuvo una respuesta exitosa
if ($response !== false) {
    // Imprimir la respuesta
    $response_data = json_decode($response, true);

    // Verificar si se obtuvieron los detalles del correo electrónico
    if (isset($response_data["Response"])) {

        $email_details = $response_data["Response"];
        /*echo "Asunto: " . $email_details["Subject"] . "\n";
        echo "Contenido HTML: " . $email_details["TemplateContent"] . "\n";*/
        //var_dump($email_details);

        echo $email_details["TemplateContent"];
    } else {
        echo "No se pudieron obtener los detalles del correo electrónico: " . $response_data["error"]["message"];
    }
} else {
    echo "No se pudieron obtener los detalles del correo electrónico: " . curl_error($ch);
}

curl_close($curl);
