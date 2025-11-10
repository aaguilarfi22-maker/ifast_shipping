<?php
require_once 'config.php';
require_once 'auth.php';

if (estaAutenticado()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verificarTokenCSRF($_POST['csrf_token'])) {
        $error = 'Token de seguridad inválido.';
    } else {
        $email = $_POST['email'] ?? '';
        
        if (empty($email)) {
            $error = 'Por favor, ingrese su correo electrónico.';
        } else {
            $resultado = generarTokenRecuperacion($email, $pdo);
            $success = $resultado['message'];
            
            // En desarrollo, mostrar el token (en producción se envía por email)
            if (isset($resultado['token'])) {
                $success .= "<br><small class='text-muted'>Token de prueba: <a href='restablecer.php?token=" . $resultado['token'] . "'>Restablecer contraseña</a></small>";
            }
        }
    }
}

$csrf_token = generarTokenCSRF();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5 col-lg-4">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-warning text-dark text-center py-4">
                        <h3 class="mb-0"><i class="bi bi-key"></i> Recuperar Contraseña</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php if ($error): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill"></i> <?php echo htmlspecialchars($error); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($success): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle-fill"></i> <?php echo $success; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        
                        <p class="text-muted mb-4">
                            Ingrese su correo electrónico y le enviaremos instrucciones para restablecer su contraseña.
                        </p>
                        
                        <form method="POST" action="">
                            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                            
                            <div class="mb-4">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope"></i> Correo Electrónico
                                </label>
                                <input type="email" class="form-control" id="email" name="email" required 
                                       placeholder="ejemplo@correo.com">
                            </div>
                            
                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-warning btn-lg text-dark">
                                    <i class="bi bi-send"></i> Enviar Instrucciones
                                </button>
                            </div>
                            
                            <div class="text-center">
                                <a href="login.php" class="text-decoration-none">
                                    <i class="bi bi-arrow-left"></i> Volver al inicio de sesión
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>