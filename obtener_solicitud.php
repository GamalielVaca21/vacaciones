<?php
header('Content-Type: application/json');

require_once '../conexion.php';
session_start();

$numero_reloj = $_SESSION['numero_reloj'] ?? null;

if (!$numero_reloj) {
    http_response_code(403);
    echo json_encode(['error' => 'Usuario no autenticado']);
    exit;
}

$sql = "SELECT id, fecha_inicio, fecha_fin, motivo, estado, fecha_solicitud 
        FROM solicitudes 
        WHERE numero_reloj = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $numero_reloj);
$stmt->execute();
$result = $stmt->get_result();

$solicitudes = [];
while ($row = $result->fetch_assoc()) {
    $solicitudes[] = $row;
}

echo json_encode($solicitudes);
