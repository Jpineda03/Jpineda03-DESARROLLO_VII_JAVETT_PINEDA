<?php
include 'config_sesion.php';

$total = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Aquí puedes manejar el procesamiento de la compra
    // Guarda la cookie del nombre del usuario
    setcookie("usuario", "Nombre del Usuario", time() + 86400); // 24 horas

    // Vacía el carrito
    unset($_SESSION['carrito']);
    echo "Gracias por tu compra!";
} else {
    // Muestra un resumen de la compra
    echo "<h2>Resumen de la Compra</h2>";
    
    // Verifica si el carrito tiene productos
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Producto ID</th><th>Cantidad</th><th>Precio Unitario</th><th>Total</th></tr>";

        foreach ($_SESSION['carrito'] as $id => $cantidad) {
            // Aquí puedes obtener el precio basado en el ID (esto es un ejemplo)
            $precioUnitario = 10; // Cambia esto según tu lógica de precios
            $subtotal = $cantidad * $precioUnitario;
            $total += $subtotal;

            echo "<tr>";
            echo "<td>" . htmlspecialchars($id) . "</td>";
            echo "<td>" . htmlspecialchars($cantidad) . "</td>";
            echo "<td>$" . htmlspecialchars($precioUnitario) . "</td>";
            echo "<td>$" . htmlspecialchars($subtotal) . "</td>";
            echo "</tr>";
        }
        
        echo "</table>";
        echo "<h3>Total a Pagar: $" . htmlspecialchars($total) . "</h3>";
    } else {
        echo "<p>El carrito está vacío.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>
    <form action="checkout.php" method="POST">
        <input type="submit" value="Finalizar Compra">
    </form>
    <a href="ver_carrito.php">Volver al Carrito</a>
</body>
</html>
