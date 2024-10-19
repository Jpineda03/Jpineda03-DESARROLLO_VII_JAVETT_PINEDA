<?php
require_once "config.php";

// Función para agregar un libro
function agregarLibro($titulo, $autor, $isbn, $anio, $cantidad) {
    global $conn;
    $sql = "INSERT INTO libros (titulo, autor, isbn, anio_publicacion, cantidad_disponible) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $titulo, $autor, $isbn, $anio, $cantidad);
    mysqli_stmt_execute($stmt);
}

// Función para listar libros
function listarLibros() {
    global $conn;
    $sql = "SELECT * FROM libros";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
