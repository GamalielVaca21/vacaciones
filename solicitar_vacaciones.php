<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitar Vacaciones</title>
    <link rel="stylesheet" href="css/formulario.css">
</head>
<body>
    <h1>Solicitud de Vacaciones</h1>
    <form action="guardar_solicitud.php" method="POST">
        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" name="fecha_inicio" required><br><br>

        <label for="fecha_fin">Fecha de fin:</label>
        <input type="date" name="fecha_fin" required><br><br>

        <label for="comentarios">Comentarios (opcional):</label><br>
        <textarea name="comentarios" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Enviar Solicitud">
    </form>
</body>
</html>
