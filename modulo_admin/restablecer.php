<?php
require_once 'config.php';
require_once 'auth.php';

if (estaAutenticado()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
$success = '';
$token = $_GET['token'] ?? '';

if (empty($token)) {
    header('Location: recuperar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verificarTokenCSRF($_POST['csrf_token'])) {
        $error = 'Token de seguridad inválido.';
    } else {
        $password = $_POST['password'] ?? '';
        $password_confirm = $_POST['password_confirm'] ?? '';
        $token_post = $_POST['token'] ?? '';
        
        if (empty($password) || empty($password_confirm)) {
            $error = 'Por favor, complete todos los campos.';
        } elseif ($password !== $password_confirm) {
            $error = 'Las contraseñas no coinciden.';
        } else {
            $resultado = restablecerPassword($token_post, $password, $pdo);
            
            if ($resultado['success']) {
                $success = $resultado['message'];
            } else {
                $error = $resultado['message'];
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
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-5 col-lg-4">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-success text-white text-center py-4">
                        <h3 class="mb-0"><i class="bi bi-shield-check"></i> Nueva Contraseña</h3>
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
                                <i class="bi bi-check-circle-fill"></i> <?php echo htmlspecialchars($success); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            <div class="text-center mt-3">
                                <a href="login.php" class="btn btn-primary">
                                    <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                                </a>
                            </div>
                        <?php else: ?>
                            <p class="text-muted mb-4">
                                Ingrese su nueva contraseña. Debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número.
                            </p>
                            
                            <form method="POST" action="" id="resetForm">
                                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                                
                                <div class="mb-3">
                                    <label for="password" class="form-label">
                                        <i class="bi bi-lock"></i> Nueva Contraseña
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" required 
                                               placeholder="Mínimo 8 caracteres">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="bi bi-eye" id="eyeIcon"></i>
                                        </button>
                                    </div>
                                    <div id="passwordHelp" class="form-text"></div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="password_confirm" class="form-label">
                                        <i class="bi bi-lock-fill"></i> Confirmar Contraseña
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required 
                                               placeholder="Repita la contraseña">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                                            <i class="bi bi-eye" id="eyeIconConfirm"></i>
                                        </button>
                                    </div>
                                    <div id="confirmHelp" class="form-text"></div>
                                </div>
                                
                                <div class="d-grid gap-2 mb-3">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="bi bi-check-circle"></i> Restablecer Contraseña
                                    </button>
                                </div>
                                
                                <div class="text-center">
                                    <a href="login.php" class="text-decoration-none">
                                        <i class="bi bi-arrow-left"></i> Volver al inicio de sesión
                                    </a>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/restablecer.js"></script>
</body>
</html>