<?php
session_start();

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // En un caso real, verificaríamos contra una base de datos
    if($usuario === "Jpineda" && $contrasena === "UTP2024") {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol']= $profesor;
        // header("Location: validacion.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }

    include 'validacion.php';

    if($usuario === "Mrivera" && $contrasena === "Panama2024") {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['rol'] = $estudiante;
        // header("Location: validacion.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Error de validación CSRF");
    }
}

// Generar token CSRF
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
    <form method="post" action="">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>