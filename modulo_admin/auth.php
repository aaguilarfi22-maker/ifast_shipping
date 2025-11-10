<?php
// auth.php - Funciones de autenticación
require_once 'config.php';

// Función para limpiar entrada
function limpiarEntrada($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Función para validar email
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Función para validar contraseña (mínimo 8 caracteres, mayúscula, minúscula, número)
function validarPassword($password) {
    return strlen($password) >= 8 && 
           preg_match('/[A-Z]/', $password) && 
           preg_match('/[a-z]/', $password) && 
           preg_match('/[0-9]/', $password);
}

// Función para verificar si el usuario está bloqueado
function usuarioBloqueado($email, $pdo) {
    $stmt = $pdo->prepare("SELECT bloqueado_hasta FROM usuarios WHERE email = ? AND bloqueado_hasta > NOW()");
    $stmt->execute([$email]);
    return $stmt->fetch() !== false;
}

// Función para bloquear usuario temporalmente
function bloquearUsuario($email, $pdo, $minutos = 15) {
    $stmt = $pdo->prepare("UPDATE usuarios SET bloqueado_hasta = DATE_ADD(NOW(), INTERVAL ? MINUTE), intentos_fallidos = intentos_fallidos + 1 WHERE email = ?");
    $stmt->execute([$minutos, $email]);
}

// Función para resetear intentos fallidos
function resetearIntentos($email, $pdo) {
    $stmt = $pdo->prepare("UPDATE usuarios SET intentos_fallidos = 0, bloqueado_hasta = NULL WHERE email = ?");
    $stmt->execute([$email]);
}

// Función de login
function iniciarSesion($email, $password, $pdo) {
    $email = limpiarEntrada($email);
    
    // Registrar intento
    registrarIntento($email, $_SERVER['REMOTE_ADDR'], false, $pdo);
    
    // Verificar si está bloqueado
    if (usuarioBloqueado($email, $pdo)) {
        return ['success' => false, 'message' => 'Usuario temporalmente bloqueado. Intente más tarde.'];
    }
    
    // Buscar usuario
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND activo = 1");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();
    
    if (!$usuario) {
        return ['success' => false, 'message' => 'Credenciales incorrectas.'];
    }
    
    // Verificar contraseña
    if (!password_verify($password, $usuario['password'])) {
        // Incrementar intentos fallidos
        $intentos = $usuario['intentos_fallidos'] + 1;
        
        if ($intentos >= 5) {
            bloquearUsuario($email, $pdo);
            return ['success' => false, 'message' => 'Demasiados intentos fallidos. Usuario bloqueado por 15 minutos.'];
        }
        
        $stmt = $pdo->prepare("UPDATE usuarios SET intentos_fallidos = ? WHERE email = ?");
        $stmt->execute([$intentos, $email]);
        
        return ['success' => false, 'message' => 'Credenciales incorrectas.'];
    }
    
    // Login exitoso
    resetearIntentos($email, $pdo);
    registrarIntento($email, $_SERVER['REMOTE_ADDR'], true, $pdo);
    
    // Actualizar último acceso
    $stmt = $pdo->prepare("UPDATE usuarios SET ultimo_acceso = NOW() WHERE id = ?");
    $stmt->execute([$usuario['id']]);
    
    // Regenerar ID de sesión para prevenir session fixation
    session_regenerate_id(true);
    
    // Establecer variables de sesión
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_email'] = $usuario['email'];
    $_SESSION['usuario_nombre'] = $usuario['nombre'];
    $_SESSION['logged_in'] = true;
    $_SESSION['ip_address'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
    
    return ['success' => true, 'message' => 'Inicio de sesión exitoso.'];
}

// Función para registrar intentos de login
function registrarIntento($email, $ip, $exito, $pdo) {
    $stmt = $pdo->prepare("INSERT INTO login_logs (email, ip_address, exito) VALUES (?, ?, ?)");
    $stmt->execute([$email, $ip, $exito ? 1 : 0]);
}

// Función para cerrar sesión
function cerrarSesion() {
    $_SESSION = array();
    
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }
    
    session_destroy();
}

// Función para verificar si el usuario está autenticado
function estaAutenticado() {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        return false;
    }
    
    // Verificar que la IP y User Agent coincidan (seguridad adicional)
    if ($_SESSION['ip_address'] !== $_SERVER['REMOTE_ADDR'] || 
        $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
        cerrarSesion();
        return false;
    }
    
    return true;
}

// Función para generar token de recuperación
function generarTokenRecuperacion($email, $pdo) {
    $email = limpiarEntrada($email);
    
    if (!validarEmail($email)) {
        return ['success' => false, 'message' => 'Email inválido.'];
    }
    
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ? AND activo = 1");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();
    
    if (!$usuario) {
        // Por seguridad, no revelamos si el email existe
        return ['success' => true, 'message' => 'Si el email existe, recibirá instrucciones de recuperación.'];
    }
    
    // Generar token único
    $token = bin2hex(random_bytes(32));
    $expiracion = date('Y-m-d H:i:s', strtotime('+1 hour'));
    
    $stmt = $pdo->prepare("UPDATE usuarios SET token_recuperacion = ?, token_expiracion = ? WHERE id = ?");
    $stmt->execute([$token, $expiracion, $usuario['id']]);
    
    // Aquí deberías enviar el email con el token
    // enviarEmailRecuperacion($email, $token);
    
    return [
        'success' => true, 
        'message' => 'Si el email existe, recibirá instrucciones de recuperación.',
        'token' => $token // En producción, esto se envía por email, no se devuelve
    ];
}

// Función para restablecer contraseña
function restablecerPassword($token, $nuevaPassword, $pdo) {
    $token = limpiarEntrada($token);
    
    if (!validarPassword($nuevaPassword)) {
        return ['success' => false, 'message' => 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número.'];
    }
    
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE token_recuperacion = ? AND token_expiracion > NOW()");
    $stmt->execute([$token]);
    $usuario = $stmt->fetch();
    
    if (!$usuario) {
        return ['success' => false, 'message' => 'Token inválido o expirado.'];
    }
    
    $passwordHash = password_hash($nuevaPassword, PASSWORD_BCRYPT, ['cost' => 12]);
    
    $stmt = $pdo->prepare("UPDATE usuarios SET password = ?, token_recuperacion = NULL, token_expiracion = NULL, intentos_fallidos = 0, bloqueado_hasta = NULL WHERE id = ?");
    $stmt->execute([$passwordHash, $usuario['id']]);
    
    return ['success' => true, 'message' => 'Contraseña restablecida exitosamente.'];
}
?>