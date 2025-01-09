<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/navbar.css">
    <title>Mi Proyecto</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="home.php">
                <img src="static/img/logo.png" alt="Logo" style="height: 30px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="menu.php">Inicio</a></li>
                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <li class="nav-item"><a class="nav-link" href="configuracion.php">Configuración</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Salir</a></li>
                    <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opciones
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="login.php">Iniciar Sesión</a>
                            <a class="dropdown-item" href="register.php">Registrarse</a>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <span class="navbar-text ml-auto">
                    Hola, <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <!-- Tu contenido principal -->
    <main class="container">
        <!-- Aquí va tu contenido -->
    </main>

    <!-- Importar Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

