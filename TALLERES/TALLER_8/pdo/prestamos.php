<?php
require_once "config.php";

// Función para registrar un préstamo
function registrarPrestamo($usuario_id, $libro_id) {
    global $pdo;
    $sql = "INSERT INTO prestamos (usuario_id, libro_id) VALUES (:usuario_id, :libro_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':usuario_id' => $usuario_id, ':libro_id' => $libro_id]);
}

// Función para listar préstamos
function listarPrestamos() {
    global $pdo;
    $sql = "SELECT p.*, u.nombre AS usuario, l.titulo AS libro 
            FROM prestamos p 
            JOIN usuarios u ON p.usuario_id = u.id 
            JOIN libros l ON p.libro_id = l.id";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
