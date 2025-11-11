<?php
// crear_usuario_simple.php - Versión simple sin dependencias
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configuración de base de datos
$host = 'localhost';
$dbname = 'bd_login_ifast';
$user = 'root';
$pass = '';

// Datos del usuario a crear
$nombre = 'Administrador';
$email = 'admin@ejemplo.com';
$password = 'Admin123!';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #28a745;
            margin: 20px 0;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #dc3545;
            margin: 20px 0;
        }
        .info-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 5px;
            transition: all 0.3s;
        }
        .btn:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 Crear Usuario Administrador</h1>
        
        <?php
        try {
            // Conectar a la base de datos
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Generar hash de la contraseña
            $passwordHash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
            
            // Verificar si el usuario ya existe
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
            $stmt->execute([$email]);
            
            if ($stmt->fetch()) {
                // Actualizar usuario existente
                $stmt = $pdo->prepare("UPDATE usuarios SET password = ?, nombre = ?, intentos_fallidos = 0, bloqueado_hasta = NULL WHERE email = ?");
                $stmt->execute([$passwordHash, $nombre, $email]);
                
                echo '<div class="success">';
                echo '<h2>✓ Usuario Actualizado</h2>';
                echo '<p>El usuario existente ha sido actualizado con la nueva contraseña.</p>';
                echo '</div>';
            } else {
                // Insertar nuevo usuario
                $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$nombre, $email, $passwordHash]);
                
                echo '<div class="success">';
                echo '<h2>✓ Usuario Creado Exitosamente</h2>';
                echo '<p>Se ha creado un nuevo usuario administrador.</p>';
                echo '</div>';
            }
            
            // Mostrar información
            echo '<div class="info-box">';
            echo '<h3>📋 Credenciales de Acceso:</h3>';
            echo '<p><strong>Email:</strong> <code>' . htmlspecialchars($email) . '</code></p>';
            echo '<p><strong>Contraseña:</strong> <code>' . htmlspecialchars($password) . '</code></p>';
            echo '<hr>';
            echo '<p><small><strong>Hash generado:</strong><br><code style="font-size: 10px;">' . htmlspecialchars($passwordHash) . '</code></small></p>';
            echo '</div>';
            
            echo '<div style="text-align: center; margin-top: 30px;">';
            echo '<a href="login.php" class="btn">🚀 Ir al Login</a>';
            echo '<a href="test_conexion.php" class="btn" style="background: #6c757d;">🔍 Ver Test</a>';
            echo '</div>';
            
        } catch(PDOException $e) {
            echo '<div class="error">';
            echo '<h2>✗ Error al Crear Usuario</h2>';
            echo '<p><strong>Error:</strong> ' . htmlspecialchars($e->getMessage()) . '</p>';
            echo '<hr>';
            echo '<h3>Posibles Soluciones:</h3>';
            echo '<ul>';
            echo '<li>Verifica que MySQL esté corriendo en XAMPP/WAMP</li>';
            echo '<li>Asegúrate de que la base de datos <code>bd_login_ifast</code> exista</li>';
            echo '<li>Verifica que la tabla <code>usuarios</code> esté creada</li>';
            echo '<li>Ejecuta el archivo <code>database.sql</code> en phpMyAdmin</li>';
            echo '</ul>';
            echo '</div>';
            
            echo '<div style="text-align: center; margin-top: 20px;">';
            echo '<a href="test_conexion.php" class="btn" style="background: #ffc107; color: #333;">🔍 Ver Diagnóstico</a>';
            echo '</div>';
        }
        ?>
        
        <div style="margin-top: 30px; padding: 15px; background: #e7f3ff; border-radius: 5px;">
            <h4>ℹ️ Información Importante:</h4>
            <ul style="margin: 10px 0; padding-left: 20px;">
                <li>Guarda estas credenciales en un lugar seguro</li>
                <li>Podrás cambiar la contraseña después del primer login</li>
                <li>Por seguridad, elimina este archivo después de usarlo</li>
            </ul>
        </div>
    </div>
</body>
</html>