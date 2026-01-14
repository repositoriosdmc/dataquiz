<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "dao_mail.php";

require_once "dao_mensajedmc.php";

$request = file_get_contents('php://input');

$data = json_decode($request, true);







// Verifica si el estado anterior es "Procesando" y el nuevo estado es "Completado"
if ($data['status'] === 'processing') {

    //Enviar mensaje
    $mensaje = new mensajeDMC();

    $mensajeSummit = $mensaje->mensaje_summit();

    $mail = new mail();

    $correo = $data['billing']['email'];

    $bbc = array("marco.medrano@dataminingperu.com");

    $mail->send_mail("Informes DMC", $correo, "DMC", "", "", "", 'LivData Summit: Confirmación de compra', $mensajeSummit,$bbc);


    $order_id = $data['id'];

    //Proceso para cambiar el estado del pedido
    updateStatusOrder($order_id);

}





function updateStatusOrder($orderId)
{
    $data_to_send =  [
        'status' => 'completed'
    ];

    $api_endpoint = 'https://livdatasummit.com/wp-json/wc/v3/orders/' . $orderId;


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $api_endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_POSTFIELDS => json_encode($data_to_send),
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic Y2tfZGZkZDNkZDA1ZTI2YzBjMDIzNDQxNWIzYzlkNzc2ODYwMDMzYjZhOTpjc18yNzgwMGE1NjA3OGQ3YWUzOTNiNmIwOWRiMTM3OTc3ZWE3MTE1ZWVh',
            'Content-Type: application/json'
        ),
    ));

    //Ejecutar la solicitud cURL
    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
}
