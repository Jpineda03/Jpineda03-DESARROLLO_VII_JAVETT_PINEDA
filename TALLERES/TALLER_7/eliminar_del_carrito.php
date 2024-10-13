<?php
include 'config_sesion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (isset($_SESSION['carrito'][$id])) {
        unset($_SESSION['carrito'][$id]); // Elimina el producto del carrito
    }
}

header("Location: ver_carritos.php");
exit();
?>
