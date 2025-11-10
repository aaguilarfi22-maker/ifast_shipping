<?php
require_once 'config.php';
require_once 'auth.php';

// Verificar autenticación
if (!estaAutenticado()) {
    header('Location: login.php');
    exit;
}

// Obtener datos del usuario
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$_SESSION['usuario_id']]);
$usuario = $stmt->fetch();

// Procesar logout
if (isset($_GET['logout'])) {
    cerrarSesion();
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">
                <i class="bi bi-speedometer2"></i> Mi Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($usuario['nombre']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Configuración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="?logout=1">
                                <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">
                                <i class="bi bi-house-door"></i> Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bar-chart"></i> Estadísticas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-file-earmark-text"></i> Reportes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-people"></i> Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i> Configuración
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Contenido Principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Bienvenido, <?php echo htmlspecialchars($usuario['nombre']); ?>!</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-download"></i> Exportar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Información del usuario -->
                <div class="alert alert-success" role="alert">
                    <i class="bi bi-check-circle-fill"></i> Has iniciado sesión exitosamente.
                    <strong>Último acceso:</strong> <?php echo date('d/m/Y H:i', strtotime($usuario['ultimo_acceso'])); ?>
                </div>

                <!-- Cards de estadísticas -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title mb-0">Usuarios</h6>
                                        <h2 class="mb-0">1,245</h2>
                                    </div>
                                    <i class="bi bi-people fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title mb-0">Ventas</h6>
                                        <h2 class="mb-0">$45,678</h2>
                                    </div>
                                    <i class="bi bi-graph-up fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title mb-0">Pedidos</h6>
                                        <h2 class="mb-0">892</h2>
                                    </div>
                                    <i class="bi bi-cart fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title mb-0">Mensajes</h6>
                                        <h2 class="mb-0">24</h2>
                                    </div>
                                    <i class="bi bi-envelope fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabla de actividad reciente -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-clock-history"></i> Actividad Reciente
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Acción</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo date('d/m/Y H:i'); ?></td>
                                        <td>Inicio de sesión</td>
                                        <td>Acceso al sistema</td>
                                        <td><span class="badge bg-success">Exitoso</span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo date('d/m/Y', strtotime('-1 day')); ?></td>
                                        <td>Actualización</td>
                                        <td>Perfil actualizado</td>
                                        <td><span class="badge bg-info">Completado</span></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo date('d/m/Y', strtotime('-2 days')); ?></td>
                                        <td>Cambio de contraseña</td>
                                        <td>Contraseña modificada</td>
                                        <td><span class="badge bg-warning">Pendiente verificación</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Información de cuenta -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-person-badge"></i> Información de Cuenta
                            </div>
                            <div class="card-body">
                                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($usuario['nombre']); ?></p>
                                <p><strong>Email:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
                                <p><strong>Fecha de registro:</strong> <?php echo date('d/m/Y', strtotime($usuario['fecha_creacion'])); ?></p>
                                <p><strong>Estado:</strong> 
                                    <span class="badge bg-success">Activo</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <i class="bi bi-shield-check"></i> Seguridad
                            </div>
                            <div class="card-body">
                                <p><strong>IP de acceso:</strong> <?php echo htmlspecialchars($_SERVER['REMOTE_ADDR']); ?></p>
                                <p><strong>Último acceso:</strong> <?php echo date('d/m/Y H:i', strtotime($usuario['ultimo_acceso'])); ?></p>
                                <p><strong>Sesión iniciada:</strong> <?php echo date('d/m/Y H:i'); ?></p>
                                <a href="#" class="btn btn-sm btn-warning">
                                    <i class="bi bi-key"></i> Cambiar Contraseña
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>