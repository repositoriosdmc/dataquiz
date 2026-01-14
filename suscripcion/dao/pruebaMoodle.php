<?

// Configuración de la solicitud a la API Moodle
$token = 'bd43693c62e4482a895bc6ac86f2c6a6'; // Reemplaza esto con tu token de acceso válido
$domain = 'https://aulavirtualdmc.com/learning'; // Reemplaza esto con tu dominio Moodle

// Parámetros de la solicitud
$params = [

        "key" => "id",
        "value" => "1"

    // Puedes agregar más criterios según sea necesario
];

// URL de la API
$url = $domain . '/webservice/rest/server.php' .
    '?wstoken=' . $token .
    '&wsfunction=core_user_get_users' .
    '&moodlewsrestformat=json';

// Inicialización de la solicitud
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

// Ejecución de la solicitud a la API Moodle
$response = curl_exec($ch);

// Cierre de la conexión
curl_close($ch);

// Manejo de la respuesta de la API
if ($response) {
    $userData = json_decode($response, true);
    // La respuesta contiene los detalles del usuario
    var_dump($userData);
} else {
    // Error en la solicitud
    echo "Error al obtener los detalles del usuario.";
}
