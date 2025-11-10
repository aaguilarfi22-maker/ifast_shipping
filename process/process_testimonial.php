<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

require_once '../config/database.php';

try {
    $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
    $last_name  = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
    $comment    = isset($_POST['comment']) ? strip_tags(trim($_POST['comment'])) : '';
    $rating     = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;

    $errors = [];

    if (empty($first_name) || strlen($first_name) < 2 || strlen($first_name) > 50) {
        $errors[] = 'El nombre debe tener entre 2 y 50 caracteres';
    }

    if (empty($last_name) || strlen($last_name) < 2 || strlen($last_name) > 50) {
        $errors[] = 'El apellido debe tener entre 2 y 50 caracteres';
    }

    if (empty($comment) || strlen($comment) < 10 || strlen($comment) > 500) {
        $errors[] = 'El comentario debe tener entre 10 y 500 caracteres';
    }

    if ($rating < 1 || $rating > 5) {
        $errors[] = 'La calificación debe estar entre 1 y 5 estrellas';
    }

    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
        exit;
    }

    if (!isset($conn) || !$conn instanceof mysqli) {
        throw new Exception('Error de conexión a la base de datos');
    }

    $sql = "INSERT INTO comments (first_name, last_name, comment, rating, created_at, is_approved)
            VALUES (?, ?, ?, ?, NOW(), 1)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        throw new Exception('Error preparando la consulta: ' . $conn->error);
    }

    $stmt->bind_param("sssi", $first_name, $last_name, $comment, $rating);

    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => '¡Gracias por tu testimonio! Ha sido registrado correctamente.',
            'data' => [
                'id' => $conn->insert_id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'comment' => $comment,
                'rating' => $rating,
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];
    } else {
        throw new Exception('Error al guardar el testimonio: ' . $stmt->error);
    }

    $stmt->close();

} catch (Exception $e) {
    error_log("Error in process_testimonial.php: " . $e->getMessage());

    $response = [
        'success' => false,
        'message' => 'Error interno del servidor. Por favor intenta más tarde.'
    ];
    http_response_code(500);
}

if (isset($conn)) {
    $conn->close();
}

echo json_encode($response);
?>
