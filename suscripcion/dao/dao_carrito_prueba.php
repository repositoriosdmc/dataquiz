<?php


// Proceso de Registro 

$request = file_get_contents('php://input');

function procesoRegistro($request)
{

  $accion = [];

  if ($data = json_decode($request, true)) {

    if ($data["status"] == "processing") {

      $orderId = $data["id"];

      $moneda = $data["currency"];

      $tipoPago = $data["payment_method_title"];

      /* Cliente */

      $nombres = $data["billing"]["first_name"];
      $apellidos = $data["billing"]["last_name"];
      $celular = $data["billing"]["phone"];
      $email = $data["billing"]["email"];
      $dni = getDNI($data["meta_data"]);

      /* Pagos de Productos */

      $listaProductos = $data["line_items"];

      $fechaTransaccion = $data["date_paid"];



      foreach ($listaProductos as $item) {

        $producto = getProducto($item["product_id"]);

        $fechaInicio = $producto['attributes'][0]['options'][0];

        $sku = $producto['sku'];

        $monto = $item['total'];

        $accion[] = matriculaApi($nombres, $apellidos, $dni, $celular, $email, $fechaInicio, $sku, $moneda, $monto, $tipoPago, $fechaTransaccion,$data);
      
      }

      //Cambiar el estado

      updateStatusOrder($orderId);
    
    }
  }
  return $accion;
}

function getDNI($data)
{

  $DNI = null;

  foreach ($data as $item) {
    if ($item["key"] === "billing_dni") {
      $DNI = $item["value"];
      break; // Terminar el bucle una vez que se encuentre el valor
    }
  }

  return $DNI;
}

function getProducto($productoId)
{

  $curl = curl_init();


  $url = 'https://dmc.pe/wp-json/wc/v3/products/' . $productoId . '?context=view&context=view';

  curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Authorization: Basic Y2tfY2IwNTQwZmMzNWVkZDY3ZmFlMmYxNTk2NjZmOTgwZmIzNjIwYmQ1ZDpjc181Yjg4YjcyNzBmYmZjNzg2Y2I3YjY2YzkxYTQwMWEwYjdmNGM0ZDQz'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);

  return json_decode($response, true);
}

function matriculaApi($nombre, $apellidos, $dni, $celular, $email, $fechaInicio, $sku, $moneda, $monto, $tipoPago, $fechaTransaccion,$request)
{

  //Conectarse a API Matricula

  $url = 'https://admin.intranetdmc.com/api/matricula-nueva';

  $data = [
    'nombres' => $nombre,
    'apellidos' => $apellidos,
    'numDocumento' => $dni,
    'celular' => $celular,
    'email' => $email,
    'moneda' => $moneda,
    'transferenciaMonto' => $monto,
    'tipoPago' => $tipoPago,
    'fechaTransaccion' => $fechaTransaccion,
    'fechaInicio' => $fechaInicio,
    'ls' => $request,
    'trt' => 1,
    'sku' => $sku
  ];

  $options = [
    'http' => [
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($data),
    ],
  ];

  $context = stream_context_create($options);

  $response = file_get_contents($url, false, $context);

  $newData = json_decode($response, true);

  return $newData;
}

function updateStatusOrder($orderId)
{
  $data_to_send =  [
    'status' => 'completed'
  ];

  $api_endpoint = 'https://dmc.pe/wp-json/wc/v3/orders/' . $orderId;


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
      'Authorization: Basic Y2tfY2IwNTQwZmMzNWVkZDY3ZmFlMmYxNTk2NjZmOTgwZmIzNjIwYmQ1ZDpjc181Yjg4YjcyNzBmYmZjNzg2Y2I3YjY2YzkxYTQwMWEwYjdmNGM0ZDQz',
      'Content-Type: application/json'
    ),
  ));

  //Ejecutar la solicitud cURL
  $response = curl_exec($curl);

  curl_close($curl);

  return $response;
}





var_dump(procesoRegistro($request));
