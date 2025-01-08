<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['departamento'])) {
    header("Location: login.php"); // Redirigir al login si no está autenticado
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="path/to/tu/carpeta/css/estilos.css"> <!-- Ruta del CSS -->
</head>
<body>
    <div class="container mt-5">
        <h2 class="centro">Programas Sociales</h2>
        <div class="menu-grid">
            <a class="menu-item" href="form.php">Cuidar y ser cuidado para el Bienestar 2025</a>
            <a class="menu-item" href="formapoyo.php">Apoyo para el bienestar 2025</a>
            <a class="menu-item" href="formtransfor.php">Transformando en Comunidad</a>
            <a class="menu-item" href="formjuven.php">Juventudes en Transformación</a>
            <a class="menu-item" href="formcuidadoinfancias.php">Fortalecimiento para el cuidado y desarrollo integral de las infancias</a>
        </div>
    </div>
</body>
</html>
