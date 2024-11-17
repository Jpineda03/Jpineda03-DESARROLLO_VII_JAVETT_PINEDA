<?php
require_once "config_pdo.php";

function mostrarBajoStock($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_productos_bajo_stock");
        echo "<h3>Productos con Bajo Stock:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Stock Actual</th>
                <th>Total Vendido</th>
              </tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['nombre']}</td>
                    <td>{$row['categoria']}</td>
                    <td>{$row['stock_actual']}</td>
                    <td>{$row['total_vendido']}</td>
                  </tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function mostrarHistorialClientes($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_historial_clientes");
        echo "<h3>Historial de Clientes:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Cliente</th>
                <th>Email</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Monto Total</th>
                <th>Fecha</th>
              </tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['cliente']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['producto']}</td>
                    <td>{$row['cantidad']}</td>
                    <td>${$row['monto_total']}</td>
                    <td>{$row['fecha']}</td>
                  </tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function mostrarMetricasCategorias($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_metricas_categorias");
        echo "<h3>Métricas de Categorías:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Categoría</th>
                <th>Total Productos</th>
                <th>Ventas Totales</th>
                <th>Producto Más Vendido</th>
              </tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['categoria']}</td>
                    <td>{$row['total_productos']}</td>
                    <td>{$row['ventas_totales']}</td>
                    <td>{$row['producto_mas_vendido']}</td>
                  </tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function mostrarTendenciasVentas($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM vista_tendencias_ventas");
        echo "<h3>Tendencias de Ventas por Mes:</h3>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Año</th>
                <th>Mes</th>
                <th>Ventas Totales</th>
                <th>Ingresos Totales</th>
                <th>Ingresos Mes Anterior</th>
              </tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['anio']}</td>
                    <td>{$row['mes']}</td>
                    <td>{$row['ventas_totales']}</td>
                    <td>${$row['ingresos_totales']}</td>
                    <td>${$row['ingresos_mes_anterior']}</td>
                  </tr>";
        }
        echo "</table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Mostrar los resultados
mostrarBajoStock($pdo);
mostrarHistorialClientes($pdo);
mostrarMetricasCategorias($pdo);
mostrarTendenciasVentas($pdo);

$pdo = null;
?>
 