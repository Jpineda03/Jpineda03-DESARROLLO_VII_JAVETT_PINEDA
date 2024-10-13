<?php
include 'config_sesion.php';

// Verifica si se recibe un ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Inicializa el carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Añade el producto al carrito
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]++;
    } else {
        $_SESSION['carrito'][$id] = 1; // Añade con cantidad 1
    }
    
    header("Location: productos.php");
    exit();
}
?>
