# Integración de SMOWL - Guía de Configuración

## 📋 ¿Qué es SMOWL?

SMOWL es un sistema de monitoreo online que permite supervisar exámenes mediante cámara y análisis de comportamiento para prevenir fraudes.

---

## 🚀 Pasos para Activar SMOWL

### 1. Instalar la librería JWT

Abre la terminal en la carpeta del proyecto y ejecuta:

```bash
composer require firebase/php-jwt
```

Si no tienes composer, descárgalo de: https://getcomposer.org/

---

### 2. Configurar Credenciales

Edita el archivo: `config/smowl_config.php`

Reemplaza estas líneas:

```php
define('SMOWL_ENTITY_NAME', 'TU_ENTITY_NAME');  // ← Reemplaza con tu entity name
define('SMOWL_SECRET_KEY', 'TU_SECRET_KEY');    // ← Reemplaza con tu secret key
```

**¿Dónde obtengo las credenciales?**
- Contacta con SMOWL: https://www.smowltech.com/
- Te proporcionarán: Entity Name y Secret Key

---

### 3. Implementar en tus Vistas

Ve al archivo `docs/smowl_implementation_example.php` para ver 4 ejemplos:

- **Ejemplo 1:** Botón manual para activar SMOWL
- **Ejemplo 2:** Redirección automática antes del examen
- **Ejemplo 3:** Botón opcional con AJAX
- **Ejemplo 4:** Endpoint AJAX para generar URLs

---

## 📁 Archivos Creados

```
certificaciones/
├── config/
│   └── smowl_config.php              ← Configuración (edita aquí)
└── docs/
    ├── smowl_implementation_example.php  ← Ejemplos de uso
    └── SMOWL_README.md               ← Este archivo
```

---

## 🔧 Uso Básico

### En cualquier vista de examen:

```php
<?php
require_once __DIR__ . '/../../config/smowl_config.php';

// Verificar si está configurado
if (isSmowlConfigured()) {
    $userName = $_SESSION['NOMBRE'] . ' ' . $_SESSION['APELLIDO'];
    $userEmail = $_SESSION['CORREO'];
    $activityUrl = 'https://certificaciones.dmc.pe/template/vista/formulario-tecnica.php';
    
    // Generar URL de SMOWL
    $smowlUrl = getSmowlRegistrationUrl($userName, $userEmail, $activityUrl);
    
    if ($smowlUrl) {
        echo '<a href="' . $smowlUrl . '" target="_blank">Activar Monitoreo</a>';
    }
}
?>
```

---

## ✅ Verificar que Todo Funciona

1. Edita `config/smowl_config.php` con tus credenciales reales
2. Instala la librería JWT con composer
3. Abre cualquier examen e incluye el código de ejemplo
4. Deberías ver el botón "Activar Monitoreo"
5. Al hacer clic, se abre SMOWL en nueva ventana

---

## 🛡️ Seguridad

- ✅ El JWT expira en 1 hora
- ✅ Nunca expongas SMOWL_SECRET_KEY en el frontend
- ✅ Siempre genera el token en el servidor (PHP)
- ✅ Usa HTTPS en producción

---

## 📞 Soporte

- Documentación SMOWL: https://docs.smowltech.com/
- Soporte técnico: support@smowltech.com

---

## 📝 Notas

- **Tipo 0 (Standard):** Monitoreo básico con cámara
- **Tipo 1 (Advanced):** Análisis facial y detección de comportamiento avanzado
- El usuario debe dar permisos de cámara/micrófono en el navegador
