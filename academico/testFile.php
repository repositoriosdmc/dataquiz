<?php
// URL a la que deseas acceder
$url = 'https://survey.dmc.pe/academico/certificadoGeneradorDoble.php?codigo=45723&nombre=Marco+Antonio&apellidos=Medrano+Contreras&capacitacion=ESPECIALIZACI%C3%93N+EN+POWER+BI+Y+VISUALIZACI%C3%93N+DE+DATOS&notas=19&horas=60&fechaIni=2023-09-30&fechaFin=2023-11-25&tipo=ESPECIALIZACI%C3%93N+DMC&documento=ASISTENCIA';

// Inicializar cURL
$curl = curl_init();

// Configurar la URL y otras opciones necesarias
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Realizar la solicitud y obtener la respuesta
$response = curl_exec($curl);

// Verificar si hubo errores
if($response === false) {
    echo 'Error al acceder a la URL: ' . curl_error($curl);
} else {
    // Procesar la respuesta obtenida
    echo $response;
}

// Cerrar la conexión cURL
curl_close($curl);
?>
