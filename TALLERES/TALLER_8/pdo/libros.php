<?php
require_once "config.php";

// Función para agregar un libro
function agregarLibro($titulo, $autor, $isbn, $anio, $cantidad) {
    global $pdo;
    $sql = "INSERT INTO libros (titulo, autor, isbn, anio_publicacion, cantidad_disponible) VALUES (:titulo, :autor, :isbn, :anio, :cantidad)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':titulo' => $titulo, ':autor' => $autor, ':isbn' => $isbn, ':anio' => $anio, ':cantidad' => $cantidad]);
}

// Función para listar libros
function listarLibros() {
    global $pdo;
    $sql = "SELECT * FROM libros";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
