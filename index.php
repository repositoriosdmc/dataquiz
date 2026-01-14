<?php

// Habilita la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inicia la sesión
session_start();

header('Location: /template/login.php');
exit;

?>