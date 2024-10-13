<?php
include 'config_sesion.php';

// Lista de productos
$productos = [
    ['id' => 1, 'nombre' => 'Producto 1', 'precio' => 10],
    ['id' => 2, 'nombre' => 'Producto 2', 'precio' => 20],
    ['id' => 3, 'nombre' => 'Producto 3', 'precio' => 15],
    ['id' => 4, 'nombre' => 'Producto 4', 'precio' => 25],
    ['id' => 5, 'nombre' => 'Producto 5', 'precio' => 30],
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>
    <h2>Lista de Productos</h2>
    <ul>
        <?php foreach ($productos as $producto): ?>
            <li>
                <?php echo htmlspecialchars($producto['nombre']); ?> - $<?php echo htmlspecialchars($producto['precio']); ?>
                <a href="agregar_al_carrito.php?id=<?php echo $producto['id']; ?>">Añadir al Carrito</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="ver_carritos.php">Ver Carrito</a>
</body>
</html>
