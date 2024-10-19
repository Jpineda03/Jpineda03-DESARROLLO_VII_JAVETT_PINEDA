<?php
require_once "config.php";

// Función para registrar un préstamo
function registrarPrestamo($usuario_id, $libro_id) {
    global $conn;
    $sql = "INSERT INTO prestamos (usuario_id, libro_id) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $usuario_id, $libro_id);
    mysqli_stmt_execute($stmt);
}

// Función para listar préstamos
function listarPrestamos() {
    global $conn;
    $sql = "SELECT p.*, u.nombre AS usuario, l.titulo AS libro 
            FROM prestamos p 
            JOIN usuarios u ON p.usuario_id = u.id 
            JOIN libros l ON p.libro_id = l.id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
