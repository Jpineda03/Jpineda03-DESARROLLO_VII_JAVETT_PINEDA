<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>UNIVERSIDAD TECNOLOGICA DE PANAMA</title>
</head>
<body>
    <h2>Bienvenido Profesor(a) , <?php echo htmlspecialchars($_SESSION['jpineda']); ?>!</h2>
    <p>Listado de Estudiantes:</p>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>