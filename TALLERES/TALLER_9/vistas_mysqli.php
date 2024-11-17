<?php
require_once "config_mysqli.php";

function mostrarBajoStock($conn) {
    $sql = "SELECT * FROM vista_productos_bajo_stock";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Productos con Bajo Stock:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Producto</th>
            <th>Categoría</th>
            <th>Stock Actual</th>
            <th>Total Vendido</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['nombre']}</td>";
        echo "<td>{$row['categoria']}</td>";
        echo "<td>{$row['stock_actual']}</td>";
        echo "<td>{$row['total_vendido']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

function mostrarHistorialClientes($conn) {
    $sql = "SELECT * FROM vista_historial_clientes";
    $result = mysqli_query($conn, $sql);

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

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['cliente']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['producto']}</td>";
        echo "<td>{$row['cantidad']}</td>";
        echo "<td>${$row['monto_total']}</td>";
        echo "<td>{$row['fecha']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

function mostrarMetricasCategorias($conn) {
    $sql = "SELECT * FROM vista_metricas_categorias";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Métricas de Categorías:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Categoría</th>
            <th>Total Productos</th>
            <th>Ventas Totales</th>
            <th>Producto Más Vendido</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['categoria']}</td>";
        echo "<td>{$row['total_productos']}</td>";
        echo "<td>{$row['ventas_totales']}</td>";
        echo "<td>{$row['producto_mas_vendido']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

function mostrarTendenciasVentas($conn) {
    $sql = "SELECT * FROM vista_tendencias_ventas";
    $result = mysqli_query($conn, $sql);

    echo "<h3>Tendencias de Ventas por Mes:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Año</th>
            <th>Mes</th>
            <th>Ventas Totales</th>
            <th>Ingresos Totales</th>
            <th>Ingresos Mes Anterior</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['anio']}</td>";
        echo "<td>{$row['mes']}</td>";
        echo "<td>{$row['ventas_totales']}</td>";
        echo "<td>${$row['ingresos_totales']}</td>";
        echo "<td>${$row['ingresos_mes_anterior']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}

// Mostrar los resultados
mostrarBajoStock($conn);
mostrarHistorialClientes($conn);
mostrarMetricasCategorias($conn);
mostrarTendenciasVentas($conn);

mysqli_close($conn);
?>
