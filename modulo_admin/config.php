<?php
// config.php - Configuración de base de datos y constantes

// Mostrar errores en desarrollo (comentar en producción)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'bd_login_ifast');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// Clave secreta para tokens (cambiar por una clave única)
define('SECRET_KEY', 'mi_clave_secreta_super_segura_2024_ifast_shipping');

// Configuración de sesión segura
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Cambiar a 1 si usas HTTPS
ini_set('session.cookie_samesite', 'Strict');

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Conexión PDO
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $e) {
    // En producción, no mostrar detalles del error
    die("Error de conexión a la base de datos. Por favor, contacte al administrador.");
    // En desarrollo, descomentar la siguiente línea:
    // die("Error de conexión: " . $e->getMessage());
}

// Función para generar token CSRF
function generarTokenCSRF() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Función para verificar token CSRF
function verificarTokenCSRF($token) {
    if (!isset($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

// Función para limpiar output buffers
function limpiarBuffers() {
    while (ob_get_level()) {
        ob_end_clean();
    }
}
?>