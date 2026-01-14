<?php
// Configuración de sesión mejorada para múltiples usuarios desde la misma IP

// Usar solo cookies para almacenar el ID de sesión
ini_set('session.use_only_cookies', 1);

// Solo usar ID de sesión generado por el servidor
ini_set('session.use_strict_mode', 1);

// Hacer las cookies HTTP-Only
ini_set('session.cookie_httponly', 1);

// Solo enviar cookies sobre HTTPS si está disponible
ini_set('session.cookie_secure', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on');

// Protección CSRF
ini_set('session.cookie_samesite', 'Lax');

// Usar un prefijo único para las cookies de sesión
$session_name = 'dmc_cert_' . substr(md5(__FILE__), 0, 8);
session_name($session_name);

// Configuración de cookies de sesión
$cookieParams = [
    'lifetime' => 86400, // 24 horas
    'path' => '/',
    'domain' => '', // No establecer dominio para evitar problemas en entornos locales
    'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
    'httponly' => true,
    'samesite' => 'Lax'
];

// Configurar los parámetros de la cookie de sesión
session_set_cookie_params($cookieParams);

// Configurar el guardado de sesiones en un directorio específico
$sessionPath = __DIR__ . '/../sessions';
if (!file_exists($sessionPath)) {
    mkdir($sessionPath, 0700, true);
}
ini_set('session.save_path', $sessionPath);

// Iniciar la sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generar un ID de sesión único por usuario
if (!isset($_SESSION['session_fingerprint'])) {
    $userFingerprint = md5(
        $_SERVER['HTTP_USER_AGENT'] .
        (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '') .
        (isset($_SERVER['HTTP_ACCEPT_ENCODING']) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : '') .
        (isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : '') .
        (isset($_SERVER['HTTP_DNT']) ? $_SERVER['HTTP_DNT'] : '')
    );
    
    // Si ya hay una sesión activa con una huella diferente, destruirla
    if (isset($_SESSION['session_fingerprint']) && $_SESSION['session_fingerprint'] !== $userFingerprint) {
        session_unset();
        session_destroy();
        session_start();
    }
    
    $_SESSION['session_fingerprint'] = $userFingerprint;
    $_SESSION['created'] = time();
}

// Regenerar el ID de sesión periódicamente para mayor seguridad
$regenerateAfter = 1800; // 30 minutos
if (!isset($_SESSION['last_regeneration'])) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
} elseif (time() - $_SESSION['last_regeneration'] > $regenerateAfter) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}

// Verificar la integridad de la sesión
function verifySessionIntegrity() {
    if (!isset($_SESSION['session_fingerprint'])) {
        return false;
    }
    
    $currentFingerprint = md5(
        $_SERVER['HTTP_USER_AGENT'] .
        (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : '') .
        (isset($_SERVER['HTTP_ACCEPT_ENCODING']) ? $_SERVER['HTTP_ACCEPT_ENCODING'] : '') .
        (isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : '') .
        (isset($_SERVER['HTTP_DNT']) ? $_SERVER['HTTP_DNT'] : '')
    );
    
    if ($_SESSION['session_fingerprint'] !== $currentFingerprint) {
        session_unset();
        session_destroy();
        return false;
    }
    
    return true;
}

// Verificar la sesión actual
if (!verifySessionIntegrity()) {
    header('Location: /login.php?error=invalid_session');
    exit();
}
?>