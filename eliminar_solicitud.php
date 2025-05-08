<?php
header('Content-Type: application/json');

require_once '../conexion.php';
session_start();

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;
$numero_reloj = $_SESSION['numero_reloj'] ?? null;

if (!$id || !$numero_reloj) {
    http_response_code(400);
    echo json_encode(['error' => 'Datos inválidos']);
    exit;
}

$stmt = $conn->prepare("DELETE FROM solicitudes WHERE id = ? AND numero_reloj = ?");
$stmt->bind_param("is", $id, $numero_reloj);
$success = $stmt->execute();

echo json_encode(['success' => $success]);

?>