<?
// URL de la API
$apiUrl = 'https://admin.intranetdmc.com/api/pruebapi';

// Inicializar una sesión cURL
$ch = curl_init($apiUrl);

// Configurar opciones de la solicitud
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Realizar la solicitud GET
$response = curl_exec($ch);

// Cerrar la sesión cURL
curl_close($ch);

// Decodificar la respuesta JSON
$data = json_decode($response, true);

// Procesar los datos de la API
if ($data) {
    // Haz algo con los datos, por ejemplo:
    print_r($data);
} else {
    echo 'Error al obtener datos de la API.';
}

?>