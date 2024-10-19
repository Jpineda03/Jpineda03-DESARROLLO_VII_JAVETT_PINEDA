<?php
require_once "config.php";

// Función para registrar un nuevo usuario
function registrarUsuario($nombre, $email, $contrasena) {
    global $conn;
    $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nombre, $email, $contrasena);
    mysqli_stmt_execute($stmt);
}

// Función para listar usuarios
function listarUsuarios() {
    global $conn;
    $sql = "SELECT * FROM usuarios";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
