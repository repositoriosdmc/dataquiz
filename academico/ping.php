<?php
$dominio = 'dmc.pe'; // La IP a la que deseas conectar
$puerto = 80; // El número de puerto al que deseas conectarte


// Intentar abrir una conexión al puerto específico en el dominio
$socket = @fsockopen($dominio, $puerto, $errorCode, $errorMsg, 5);

// Verificar si la conexión se pudo establecer
if ($socket !== false) {
    echo "Conexión exitosa al puerto $puerto en $dominio";
    fclose($socket); // Cerrar el socket abierto
} else {
    echo "No se pudo establecer conexión al puerto $puerto en $dominio: $errorMsg ($errorCode)";
}
?>



