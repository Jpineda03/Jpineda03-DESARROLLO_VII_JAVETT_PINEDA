<?php

include 'funciones_tienda.php';
$productos = [
    'camisa' => 50,
    'pantalon' => 70,
    'zapatos' => 80,
    'calcetines' => 10,
    'gorra' => 25
];

$carrito = [
    'camisa' => 2,
    'pantalon' => 1,
    'zapatos' => 1,
    'calcetines' => 3,
    'gorra' => 0
];

$subtotal = 0;
foreach ($carrito as $producto => $cantidad) {
    $subtotal += $productos[$producto] * $cantidad;
}

$descuento = calcular_descuento($subtotal);
$impuesto = aplicar_impuesto($subtotal);
$total_a_pagar = calcular_total($subtotal, $descuento, $impuesto);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Resumen de la Compra</title>
</head>
<body>
    <h1>Resumen de la Compra</h1>
    <ul>
        <?php foreach ($carrito as $producto => $cantidad): ?>
            <?php if ($cantidad > 0): ?>
                <li><?php echo $producto . ": " . $cantidad . " x $" . $productos[$producto] . " = $" . $productos[$producto] * $cantidad; ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <p>Subtotal: $<?php echo number_format($subtotal, 2); ?></p>
    <p>Descuento: -$<?php echo number_format($descuento, 2); ?></p>
    <p>Impuesto: +$<?php echo number_format($impuesto, 2); ?></p>
    <h2>Total a pagar: $<?php echo number_format($total_a_pagar, 2); ?></h2>
</body>
</html>
