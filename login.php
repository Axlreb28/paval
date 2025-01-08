<?php
session_start();
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $departamento_nombre = $_POST['departamento_nombre'];
    $password = $_POST['password'];

    // Verificar que los campos no estén vacíos
    if (empty($departamento_nombre) || empty($password)) {
        $error = "Por favor, llena todos los campos.";
    } else {
        // Conexión a la base de datos (ajusta estos valores a tu configuración)
        $conn = new mysqli('localhost', 'root', '', 'indicadorestlalpan');

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Verificar si el departamento existe y obtener su ID
        $departamento_query = $conn->prepare("SELECT ID, Contraseña FROM Departamentos WHERE Departamento = ?");
        $departamento_query->bind_param("s", $departamento_nombre);
        $departamento_query->execute();
        $departamento_result = $departamento_query->get_result();

        if ($departamento_result->num_rows == 0) {
            $error = "El nombre del departamento es incorrecto.";
        } else {
            $departamento_row = $departamento_result->fetch_assoc();
            $departamento_id = $departamento_row['ID'];
            $hashed_password = $departamento_row['Contraseña'];

            // Verificar si la contraseña es correcta
            if (password_verify($password, $hashed_password)) {
                // Iniciar sesión del departamento
                $_SESSION['departamento'] = $departamento_nombre;
                $_SESSION['departamento_id'] = $departamento_id;

                // Redirigir a la página solicitada o al menú por defecto
                header("Location: menu.php"); // Cambia "menu.php" al nombre de tu página de menú
                exit();
            } else {
                $error = "Contraseña incorrecta.";
            }
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="/static/css/login.css">
    <link rel="icon" type="image/png" href="/static/logo.png">
    <!-- Aquí está la línea corregida -->
    <link rel="stylesheet" href="/static/css/login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="index.php">
                <img src="/static/logo.png" alt="Logo" style="height: 30px;">
            </a>
        </nav>
    </header>

    <!-- Contenido principal del Login -->
    <div class="login-page">
        <h1>¡Bienvenid@!</h1>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="logo">
                    <img src="/static/logo.png" id="imagen" alt="Logo">
                </div>
                <form method="POST" action="login.php">
                    <div class="form-group">
                        <label for="departamento_nombre">Nombre del Departamento:</label>
                        <input type="text" id="departamento_nombre" class="fadeIn second form-control" name="departamento_nombre" placeholder="Departamento" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" class="fadeIn third form-control" name="password" placeholder="Contraseña" required>
                    </div>
                    <input type="submit" class="fadeIn fourth btn btn-primary" value="Iniciar Sesión">
                </form>

                <!-- Mostrar mensaje de error si hay uno -->
                <?php if ($error): ?>
                    <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                <?php endif; ?>

                <!-- Enlace de Registro -->
                <div id="formFooter">
                    <a class="underlineHover btn btn-secondary" href="register.php">Registrarse</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
