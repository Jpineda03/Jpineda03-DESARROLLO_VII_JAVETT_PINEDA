<?php

// Función para leer el inventario desde el archivo JSON y convertirlo en un array de productos
function leerInventario($archivo) {
    $contenido = file_get_contents($archivo);
    return json_decode($contenido, true);
}

// Función para ordenar el inventario alfabéticamente por nombre del producto
function ordenarInventarioPorNombre(&$inventario) {
    usort($inventario, function($a, $b) {
        return strcmp($a['nombre'], $b['nombre']);
    });
}

// Función para mostrar un resumen del inventario ordenado (nombre, precio, cantidad)
function mostrarResumenInventario($inventario) {
    foreach ($inventario as $producto) {
        echo "<br>Producto: " . $producto['nombre'] ;
        echo " ==> Precio: $" . number_format($producto['precio'], 2);
        echo "==> Cantidad: " . $producto['cantidad'];
        
    }
}

// Función para calcular el valor total del inventario
function calcularValorTotalInventario($inventario) {
    return array_sum(array_map(function($producto) {
        return $producto['precio'] * $producto['cantidad'];
    }, $inventario));
}

// Función para generar un informe de productos con stock bajo (menos de 5 unidades)
function generarInformeStockBajo($inventario) {
    $stockBajo = array_filter($inventario, function($producto) {
        return $producto['cantidad'] < 5;
    });

    if (count($stockBajo) > 0) {
        echo "<br><br>Productos con stock bajo:";
        foreach ($stockBajo as $producto) {
            echo "<br>Producto: " . $producto['nombre'] . " - Cantidad: " . $producto['cantidad'] . "\n";
        }
    } else {
        echo "<br>No hay productos con stock bajo";
    }
}

// Script principal
$archivo = 'inventario.json';
$inventario = leerInventario($archivo);

ordenarInventarioPorNombre($inventario);

echo "Resumen del inventario ordenado:\n";
echo "<br>===============================";
mostrarResumenInventario($inventario);

$valorTotal = calcularValorTotalInventario($inventario);
echo "<br><br>Valor total del inventario: $" . number_format($valorTotal, 2);

generarInformeStockBajo($inventario);

?>
