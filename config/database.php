<?php
// config/database.php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ifast_shipping';

// Crear conexión
$conn = new mysqli($host, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configurar charset UTF-8
$conn->set_charset("utf8mb4");

// Configurar zona horaria
date_default_timezone_set('America/Lima');
?>