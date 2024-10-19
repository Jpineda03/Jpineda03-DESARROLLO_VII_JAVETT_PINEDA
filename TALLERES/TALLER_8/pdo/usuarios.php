<?php
require_once "config.php";

// Función para registrar un nuevo usuario
function registrarUsuario($nombre, $email, $contrasena) {
    global $pdo;
    $sql = "INSERT INTO usuarios (nombre, email, contrasena) VALUES (:nombre, :email, :contrasena)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nombre' => $nombre, ':email' => $email, ':contrasena' => $contrasena]);
}

// Función para listar usuarios
function listarUsuarios() {
    global $pdo;
    $sql = "SELECT * FROM usuarios";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
