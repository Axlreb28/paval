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
        // Conexión a la base de datos
        $conn = new mysqli('localhost', 'root', '', 'indicadorestlalpan');

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Buscar el departamento por su nombre
        $stmt = $conn->prepare("
            SELECT d.ID AS DepartamentoID, d.Departamento, u.Contraseña 
            FROM Departamentos d
            JOIN RegistroUsuarios u ON d.ID = u.DepartamentoID
            WHERE d.Departamento = ?
        ");
        $stmt->bind_param("s", $departamento_nombre);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $error = "El nombre del departamento es incorrecto o no tiene usuarios registrados.";
        } else {
            $row = $result->fetch_assoc();
            $departamento_id = $row['DepartamentoID'];
            $hashed_password = $row['Contraseña'];

            // Verificar la contraseña
            if (password_verify($password, $hashed_password)) {
                // Guardar datos de sesión
                $_SESSION['departamento'] = $departamento_nombre;
                $_SESSION['departamento_id'] = $departamento_id;

                // Redirigir al menú
                header("Location: menu.php");
                exit();
            } else {
                $error = "Contraseña incorrecta.";
            }
        }

        $stmt->close();
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
    <link rel="stylesheet" href="static/css/login.css">
    <link rel="icon" type="image/png" href="static/img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="index.php">
                <img src="static/img/logo.png" alt="Logo" style="height: 30px;">
            </a>
        </nav>
    </header>

    <div class="login-page">
        <h1>¡Bienvenid@!</h1>
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <div class="logo">
                    <img src="static/img/logo.png" id="imagen" alt="Logo">
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
                    <input type="submit" class="fadeIn fourth button" value="Iniciar Sesión">
                </form>

                <!-- Mostrar mensaje de error si hay uno -->
                <?php if ($error): ?>
                    <div class="alert mt-3"><?php echo $error; ?></div>
                <?php endif; ?>

                <div id="formFooter">
                    <a class="underlineHover button-secondary" href="register.php">Registrarse</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
