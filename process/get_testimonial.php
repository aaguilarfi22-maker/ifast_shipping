<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'conexion.php';

try {
    $sql = "SELECT first_name, last_name, comment, rating, created_at FROM testimonios WHERE is_approved = 1 ORDER BY created_at DESC";
    $result = $conn->query($sql);

    $html = '';

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $firstName = htmlspecialchars($row['first_name']);
            $lastName = htmlspecialchars($row['last_name']);
            $comment = htmlspecialchars($row['comment']);
            $rating = (int)$row['rating'];
            $date = date('d/m/Y', strtotime($row['created_at']));
            $initials = strtoupper(substr($firstName, 0, 1) . substr($lastName, 0, 1));

            $html .= '<div class="testimonial-card">';
            $html .= '<div class="testimonial-rating">';
            for ($i = 1; $i <= 5; $i++) {
                $html .= '<span class="star' . ($i > $rating ? ' empty' : '') . '">★</span>';
            }
            $html .= '</div>';
            $html .= '<div class="testimonial-comment">' . $comment . '</div>';
            $html .= '<div class="testimonial-author">';
            $html .= '<div class="author-avatar">' . $initials . '</div>';
            $html .= '<div class="author-info">';
            $html .= '<h4>' . $firstName . ' ' . $lastName . '</h4>';
            $html .= '<span>' . $date . '</span>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
    } else {
        $html .= '<div class="empty-testimonials">';
        $html .= '<h3>¡Sé el primero en dejar un testimonio!</h3>';
        $html .= '<p>Ayuda a otros clientes compartiendo tu experiencia</p>';
        $html .= '</div>';
    }

    $response = [
        'success' => true,
        'html' => $html,
        'count' => $result ? $result->num_rows : 0,
        'hasTestimonials' => $result && $result->num_rows > 0
    ];
} catch (Exception $e) {
    error_log("Error in get_testimonials.php: " . $e->getMessage());

    $response = [
        'success' => false,
        'message' => 'Error al cargar testimonios',
        'html' => '<div class="empty-testimonials"><h3>Error al cargar testimonios</h3><p>Por favor recarga la página</p></div>',
        'count' => 0,
        'hasTestimonials' => false
    ];
    http_response_code(500);
}

if (isset($conn)) {
    $conn->close();
}

echo json_encode($response);
?>
