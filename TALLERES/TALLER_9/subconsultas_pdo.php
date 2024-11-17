<?php
require_once "config_pdo.php"; // Archivo para conexión PDO

try {
    // 1. Productos que nunca se han vendido (PDO)
    $sql = "SELECT p.nombre FROM productos p 
            LEFT JOIN ventas v ON p.id = v.producto_id 
            WHERE v.producto_id IS NULL";
    $stmt = $pdo->query($sql);
    echo "<h3>Productos que nunca se han vendido (PDO):</h3>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Producto: {$row['nombre']}<br>";
    }

    // 1. Productos que nunca se han vendido (MySQLi)
    $sql = "SELECT p.nombre FROM productos p 
            LEFT JOIN ventas v ON p.id = v.producto_id 
            WHERE v.producto_id IS NULL";
    $result = $mysqli->query($sql);
    echo "<h3>Productos que nunca se han vendido (MySQLi):</h3>";
    while ($row = $result->fetch_assoc()) {
        echo "Producto: {$row['nombre']}<br>";
    }

    // 2. Categorías con el número de productos y el valor total del inventario (PDO)
    $sql = "SELECT c.nombre AS categoria, COUNT(p.id) AS num_productos, 
            SUM(p.precio * p.cantidad) AS valor_inventario
            FROM categorias c
            LEFT JOIN productos p ON c.id = p.categoria_id
            GROUP BY c.id";
    $stmt = $pdo->query($sql);
    echo "<h3>Categorías con número de productos y valor total del inventario (PDO):</h3>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Categoría: {$row['categoria']}, Número de productos: {$row['num_productos']}, ";
        echo "Valor total del inventario: {$row['valor_inventario']}<br>";
    }

    // 2. Categorías con el número de productos y el valor total del inventario (MySQLi)
    $sql = "SELECT c.nombre AS categoria, COUNT(p.id) AS num_productos, 
            SUM(p.precio * p.cantidad) AS valor_inventario
            FROM categorias c
            LEFT JOIN productos p ON c.id = p.categoria_id
            GROUP BY c.id";
    $result = $mysqli->query($sql);
    echo "<h3>Categorías con número de productos y valor total del inventario (MySQLi):</h3>";
    while ($row = $result->fetch_assoc()) {
        echo "Categoría: {$row['categoria']}, Número de productos: {$row['num_productos']}, ";
        echo "Valor total del inventario: {$row['valor_inventario']}<br>";
    }

    // 3. Clientes que han comprado todos los productos de una categoría específica (PDO)
    $categoriaId = 1; // Cambiar según la categoría deseada
    $sql = "SELECT c.nombre FROM clientes c
            WHERE NOT EXISTS (
                SELECT 1 FROM productos p 
                WHERE p.categoria_id = :categoriaId AND NOT EXISTS (
                    SELECT 1 FROM ventas v 
                    WHERE v.cliente_id = c.id AND v.producto_id = p.id
                )
            )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['categoriaId' => $categoriaId]);
    echo "<h3>Clientes que han comprado todos los productos de la categoría $categoriaId (PDO):</h3>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Cliente: {$row['nombre']}<br>";
    }

    // 3. Clientes que han comprado todos los productos de una categoría específica (MySQLi)
    $sql = "SELECT c.nombre FROM clientes c
            WHERE NOT EXISTS (
                SELECT 1 FROM productos p 
                WHERE p.categoria_id = $categoriaId AND NOT EXISTS (
                    SELECT 1 FROM ventas v 
                    WHERE v.cliente_id = c.id AND v.producto_id = p.id
                )
            )";
    $result = $mysqli->query($sql);
    echo "<h3>Clientes que han comprado todos los productos de la categoría $categoriaId (MySQLi):</h3>";
    while ($row = $result->fetch_assoc()) {
        echo "Cliente: {$row['nombre']}<br>";
    }

    // 4. Porcentaje de ventas de cada producto respecto al total de ventas (PDO)
    $sql = "SELECT p.nombre, 
            SUM(v.cantidad) AS total_vendido,
            (SUM(v.cantidad) / (SELECT SUM(cantidad) FROM ventas) * 100) AS porcentaje
            FROM productos p
            JOIN ventas v ON p.id = v.producto_id
            GROUP BY p.id";
    $stmt = $pdo->query($sql);
    echo "<h3>Porcentaje de ventas de cada producto (PDO):</h3>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Producto: {$row['nombre']}, Porcentaje de ventas: {$row['porcentaje']}%<br>";
    }

    // 4. Porcentaje de ventas de cada producto respecto al total de ventas (MySQLi)
    $sql = "SELECT p.nombre, 
            SUM(v.cantidad) AS total_vendido,
            (SUM(v.cantidad) / (SELECT SUM(cantidad) FROM ventas) * 100) AS porcentaje
            FROM productos p
            JOIN ventas v ON p.id = v.producto_id
            GROUP BY p.id";
    $result = $mysqli->query($sql);
    echo "<h3>Porcentaje de ventas de cada producto (MySQLi):</h3>";
    while ($row = $result->fetch_assoc()) {
        echo "Producto: {$row['nombre']}, Porcentaje de ventas: {$row['porcentaje']}%<br>";
    }
} catch (PDOException $e) {
    echo "Error (PDO): " . $e->getMessage();
} catch (mysqli_sql_exception $e) {
    echo "Error (MySQLi): " . $e->getMessage();
}

// Cerrar conexiones
$pdo = null;
$mysqli->close();
?>
