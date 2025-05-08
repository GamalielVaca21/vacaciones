<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Usuario</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="contenedor">
        <section class="top">
            <h1 class="titulo">Sistema de Vacaciones</h1>
            <img id="logo" src="img/logo_empresa.png" alt="Logo Empresa">
        </section>

        <div class="info">
            <h1>
            <?php
                session_start();
                if (isset($_SESSION['nombre'])) {
                    $nombre = $_SESSION['nombre'];
                    echo "SALUDOS, " . htmlspecialchars(string: $nombre);
                } else {
                    echo "No se ha iniciado sesión.";
                    exit; 
                }
            ?>
            </h1><br>

            <?php
                include('conexion.php');

                $numero_reloj = $_SESSION['numero_reloj'];
                $query = "SELECT dias_vacaciones FROM usuario WHERE numero_reloj = '$numero_reloj'";
                $resultado = mysqli_query($conn, $query);

                if ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<h2>Días de vacaciones disponibles: " . $fila['dias_vacaciones'] . "</h2>";
                } else {
                    echo "<h2>No tienes días disponibles registrados.</h2>";
                }
            ?>
            <br><br>

            <div class="acciones">
                <button onclick="location.href='solicitar_vacaciones.php'" class="send-button">Solicitar Vacaciones</button>
                <!--<button onclick="location.href='solicitar_permiso.php'" class="send-button">Solicitar Permiso</button>-->
                <button onclick="location.href='logout.php'" class="send-button">Cerrar Sesión</button>
            </div>
        </div>

        <div class="footer">
            <div class="direccion">
                <h2>Dirección</h2>
                <p>32575, Libre Comercio 32, Americas, Juárez, Chih.</p>
            </div>
            <div class="tel">
                <h2>Teléfono</h2>
                <p>656 171 9693</p>
            </div>
        </div>
    </div>

    <script src="js/header.js"></script>
</body>
</html>
