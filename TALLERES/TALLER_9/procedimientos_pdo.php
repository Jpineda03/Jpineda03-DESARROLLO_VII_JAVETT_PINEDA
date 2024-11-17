<?php
require_once "config_pdo.php";

// Procesar devolución
function procesarDevolucion($pdo, $producto_id, $cantidad, $venta_id) {
    try {
        $stmt = $pdo->prepare("CALL sp_procesar_devolucion(:producto_id, :cantidad, :venta_id)");
        $stmt->bindParam(':producto_id', $producto_id, PDO::PARAM_INT);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->bindParam(':venta_id', $venta_id, PDO::PARAM_INT);
        $stmt->execute();
        echo "Devolución procesada con éxito.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Aplicar descuento
function aplicarDescuento($pdo, $cliente_id, $monto_compra) {
    try {
        $stmt = $pdo->prepare("CALL sp_aplicar_descuento(:cliente_id, :monto_compra, @descuento)");
        $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
        $stmt->bindParam(':monto_compra', $monto_compra);
        $stmt->execute();

        $result = $pdo->query("SELECT @descuento AS descuento")->fetch(PDO::FETCH_ASSOC);
        echo "Descuento aplicado: $" . $result['descuento'];
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Ejemplo de uso
procesarDevolucion($pdo, 1, 2, 1);
aplicarDescuento($pdo, 1, 100);

$pdo = null;
?>
