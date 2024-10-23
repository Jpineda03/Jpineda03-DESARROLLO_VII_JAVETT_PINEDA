<?php
// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['usuario'])) {
    header("Location: calificaciones.php");
     exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validacion de Usuario</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
    <p></p>
    <a href="calificaciones.php">Cerrar Sesión</a>
    <!-- <a href="calificaciones.php">Cerrar Sesión</a> -->
</body>
</html>