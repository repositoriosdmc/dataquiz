<?php
/**
 * EJEMPLO DE IMPLEMENTACIÓN DE SMOWL
 * 
 * Este archivo muestra cómo integrar SMOWL en tus formularios de examen.
 * NO es un archivo funcional, solo un ejemplo de referencia.
 * 
 * PASOS PARA ACTIVAR SMOWL:
 * 
 * 1. Instalar la librería JWT:
 *    composer require firebase/php-jwt
 * 
 * 2. Configurar credenciales en config/smowl_config.php:
 *    - SMOWL_ENTITY_NAME
 *    - SMOWL_SECRET_KEY
 * 
 * 3. Implementar el código de ejemplo en tus vistas
 */

// ==========================================
// EJEMPLO 1: Mostrar enlace en formulario-tecnica.php
// ==========================================
/*
<?php
session_start();
require_once __DIR__ . '/../../config/smowl_config.php';

// Verificar si SMOWL está configurado
if (isSmowlConfigured()) {
    // Datos del usuario desde la sesión
    $userName = $_SESSION['NOMBRE'] . ' ' . $_SESSION['APELLADO'];
    $userEmail = $_SESSION['CORREO'];
    
    // URL del examen actual
    $activityUrl = 'https://certificaciones.dmc.pe/template/vista/formulario-tecnica.php?cap=' . $_SESSION['capacitacion'];
    
    // Generar URL de SMOWL
    $smowlUrl = getSmowlRegistrationUrl($userName, $userEmail, $activityUrl);
    
    if ($smowlUrl) {
        // Mostrar botón para abrir SMOWL
        echo '<a href="' . htmlspecialchars($smowlUrl) . '" target="_blank" class="btn btn-warning mb-3">
                <i class="fa fa-video-camera"></i> Activar Monitoreo SMOWL
              </a>';
    }
}
?>
*/

// ==========================================
// EJEMPLO 2: Redirigir automáticamente a SMOWL antes del examen
// ==========================================
/*
<?php
session_start();
require_once __DIR__ . '/../../config/smowl_config.php';

if (isSmowlConfigured() && !isset($_SESSION['smowl_verified'])) {
    $userName = $_SESSION['NOMBRE'] . ' ' . $_SESSION['APELLIDO'];
    $userEmail = $_SESSION['CORREO'];
    $activityUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
    $smowlUrl = getSmowlRegistrationUrl($userName, $userEmail, $activityUrl);
    
    if ($smowlUrl) {
        // Redirigir a SMOWL - cuando regrese, marcar como verificado
        $_SESSION['smowl_verified'] = true;
        header('Location: ' . $smowlUrl);
        exit;
    }
}
?>
*/

// ==========================================
// EJEMPLO 3: Botón opcional en la vista de examen
// ==========================================
/*
<!-- HTML -->
<?php if (isSmowlConfigured()): ?>
    <div class="alert alert-info">
        <strong>Monitoreo de Examen:</strong> 
        Para validar tu certificación, debes activar el monitoreo SMOWL.
        <br>
        <a href="#" id="activar-smowl" class="btn btn-sm btn-primary mt-2">
            Activar Monitoreo
        </a>
    </div>
    
    <script>
    $('#activar-smowl').click(function(e) {
        e.preventDefault();
        
        $.post('../config/generate_smowl_url.php', {
            activityUrl: window.location.href
        }, function(data) {
            if (data.success) {
                window.open(data.url, '_blank');
            } else {
                alert('Error al generar URL de SMOWL');
            }
        }, 'json');
    });
    </script>
<?php endif; ?>
*/

// ==========================================
// EJEMPLO 4: Endpoint AJAX para generar URL
// ==========================================
/*
// Crear archivo: config/generate_smowl_url.php
<?php
session_start();
require_once __DIR__ . '/smowl_config.php';

header('Content-Type: application/json');

if (!isSmowlConfigured()) {
    echo json_encode(['success' => false, 'error' => 'SMOWL no configurado']);
    exit;
}

if (!isset($_SESSION['ID'])) {
    echo json_encode(['success' => false, 'error' => 'No hay sesión activa']);
    exit;
}

$userName = $_SESSION['NOMBRE'] . ' ' . $_SESSION['APELLIDO'];
$userEmail = $_SESSION['CORREO'];
$activityUrl = $_POST['activityUrl'] ?? '';

if (empty($activityUrl)) {
    echo json_encode(['success' => false, 'error' => 'URL de actividad requerida']);
    exit;
}

$smowlUrl = getSmowlRegistrationUrl($userName, $userEmail, $activityUrl);

if ($smowlUrl) {
    echo json_encode(['success' => true, 'url' => $smowlUrl]);
} else {
    echo json_encode(['success' => false, 'error' => 'Error generando URL']);
}
?>
*/

// ==========================================
// NOTAS IMPORTANTES
// ==========================================
/*
 * TIPO DE MONITOREO (parámetro $type):
 * - 0 = Standard: Monitoreo básico
 * - 1 = Advanced: Monitoreo avanzado con análisis facial
 * 
 * FLUJO DE SMOWL:
 * 1. Usuario hace clic en enlace/botón
 * 2. Se abre ventana de SMOWL
 * 3. Usuario da permisos de cámara/micrófono
 * 4. SMOWL redirige de vuelta a activityUrl
 * 5. Usuario completa el examen mientras es monitoreado
 * 
 * SEGURIDAD:
 * - El JWT expira en 1 hora
 * - Nunca expongas SMOWL_SECRET_KEY en el frontend
 * - Siempre genera el token en el servidor
 */
