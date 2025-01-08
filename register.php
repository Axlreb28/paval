<?php
session_start();
$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar datos del formulario
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $departamento_nombre = $_POST['departamento_nombre'];
    $password = $_POST['password'];

    // Verificar que los campos no estén vacíos
    if (empty($first_name) || empty($last_name) || empty($email) || empty($departamento_nombre) || empty($password)) {
        $error = "Por favor, llena todos los campos.";
    } else {
        // Conexión a la base de datos (ajusta estos valores a tu configuración)
        $conn = new mysqli('localhost', 'root', '', 'indicadorestlalpan');

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Verificar si el departamento existe
        $departamento_query = $conn->prepare("SELECT ID FROM Departamentos WHERE Departamento = ?");
        $departamento_query->bind_param("s", $departamento_nombre);
        $departamento_query->execute();
        $departamento_result = $departamento_query->get_result();

        if ($departamento_result->num_rows == 0) {
            $error = "El departamento ingresado no existe. Por favor, verifica el nombre.";
        } else {
            $departamento_row = $departamento_result->fetch_assoc();
            $departamento_id = $departamento_row['ID'];

            // Verificar si el correo ya está registrado
            $email_check_query = $conn->prepare("SELECT Email FROM RegistroUsuarios WHERE Email = ?");
            $email_check_query->bind_param("s", $email);
            $email_check_query->execute();
            $email_check_result = $email_check_query->get_result();

            if ($email_check_result->num_rows > 0) {
                $error = "El correo electrónico ya está registrado.";
            } else {
                // Insertar el nuevo usuario en la base de datos
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Generar el hash de la contraseña
                $insert_query = $conn->prepare("INSERT INTO RegistroUsuarios (Nombre, Apellidos, Email, DepartamentoID, Contraseña) VALUES (?, ?, ?, ?, ?)");
                $insert_query->bind_param("sssis", $first_name, $last_name, $email, $departamento_id, $hashed_password);
                $insert_query->execute();

                $success = "Registro exitoso, ahora puedes iniciar sesión.";
                header("Location: login.php"); // Redirigir al login después del registro
                exit();
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
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="/static/logo.png">
    <link rel="stylesheet" href="/static/register.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="index.php">
                <img src="/static/logo.png" alt="Logo" style="height: 30px;">
            </a>
        </nav>
    </header>

    <!-- Contenido principal del Registro -->
    <div class="container mt-5">
        <h2>Registro</h2>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="first_name">Nombre:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Apellidos:</label>
                <input type="text" class="form-control" name="last_name" id="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="departamento_nombre">Departamento:</label>
                <input type="text" class="form-control" name="departamento_nombre" id="departamento_nombre" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>

        <!-- Mostrar mensaje de error o éxito -->
        <?php if ($error): ?>
            <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success mt-3"><?php echo $success; ?></div>
        <?php endif; ?>

        <!-- Enlace para ir al login -->
        <div id="formFooter">
            <a class="underlineHover btn btn-secondary" href="login.php">Iniciar Sesión</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
