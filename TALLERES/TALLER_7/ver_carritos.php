<?php
include 'config_sesion.php';

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Carrito</title>
</head>
<body>
    <h2>Carrito de Compras</h2>
    <ul>
        <?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0): ?>
            <?php foreach ($_SESSION['carrito'] as $id => $cantidad): ?>
                <li>
                    Producto ID: <?php echo htmlspecialchars($id); ?> - Cantidad: <?php echo htmlspecialchars($cantidad); ?>
                    <a href="eliminar_del_carrito.php?id=<?php echo $id; ?>">Eliminar</a>
                </li>
                <?php
                // Aquí deberías sumar el precio basado en el ID (necesitarás un array de precios)
                $total += $cantidad * 10; // Cambia esto con tu lógica de precios
                ?>
            <?php endforeach; ?>
        <?php else: ?>
            <li>El carrito está vacío.</li>
        <?php endif; ?>
    </ul>
    <h3>Total: $<?php echo htmlspecialchars($total); ?></h3>
    <a href="checkout.php">Finalizar Compra</a>
    <a href="productos.php">Seguir Comprando</a>
</body>
</html>
