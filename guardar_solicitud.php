<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['nombre'])) {
    echo "Debes iniciar sesión.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_reloj = $_SESSION['numero_reloj'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $motivo = $_POST['motivo'];

    $sql = "INSERT INTO solicitudes (numero_reloj, fecha_inicio, fecha_fin, motivo, estado)
            VALUES ('$numero_reloj', '$fecha_inicio', '$fecha_fin', '$motivo', 'pendiente')";

    if ($conn->query($sql) === TRUE) {
        echo "Solicitud enviada correctamente.";
        header("Location: dashboard.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Acceso no permitido.";
}

$conn->close();
?>
