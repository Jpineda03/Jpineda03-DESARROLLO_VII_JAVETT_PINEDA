<?php

// Lista de productos
$calificaciones = [
    ['id' => 1, 'nombre' => 'Juan Perez', 'nota' => 100],
    ['id' => 2, 'nombre' => 'Mario Rivera', 'nota' => 86],
    ['id' => 3, 'nombre' => 'Julio Trivino', 'nota' => 98],
    ['id' => 4, 'nombre' => 'Jules Brown', 'nota' => 71],
    ['id' => 5, 'nombre' => 'Katherine Herrera', 'nota' => 74],
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calificaciones</title>
</head>
<body>
<h1>Bienvenido</h1>
<h2>UNIVERSIDAD TECNOLOGICA DE PANAMA</h2>
    <h3>Lista de Calificaciones</h3>
    <ul>
        <?php foreach ($calificaciones as $calificacion): ?>
            <li>
                <?php echo htmlspecialchars($calificacion['nombre']); ?> - Calificacion <?php echo htmlspecialchars($calificacion['nota']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="logout.php">Cerrar Sesion</a>
</body>
</html>