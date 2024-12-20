<?php
require_once "config_mysqli.php";

// Función para registrar errores en un archivo de log
function log_error($error_message) {
    $log_file = 'error_log.txt'; // Cambia el nombre si lo necesitas
    $timestamp = date("Y-m-d H:i:s");
    file_put_contents($log_file, "[$timestamp] $error_message" . PHP_EOL, FILE_APPEND);
}

mysqli_begin_transaction($conn);

try {
    // Insertar un nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, email) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $nombre, $email);
    $nombre = "Nuevo Usuario";
    $email = "nuevo@example.com";
    mysqli_stmt_execute($stmt);
    
    if (mysqli_stmt_affected_rows($stmt) === 0) {
        throw new Exception("No se insertó el usuario.");
    }

    $usuario_id = mysqli_insert_id($conn);

    // Insertar una publicación para ese usuario
    $sql = "INSERT INTO publicaciones (usuario_id, titulo, contenido) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iss", $usuario_id, $titulo, $contenido);
    $titulo = "Nueva Publicación";
    $contenido = "Contenido de la nueva publicación";
    mysqli_stmt_execute($stmt);
    
    if (mysqli_stmt_affected_rows($stmt) === 0) {
        throw new Exception("No se insertó la publicación.");
    }

    mysqli_commit($conn);
    echo "Transacción completada con éxito.";
} catch (Exception $e) {
    mysqli_rollback($conn);
    log_error("Error en la transacción: " . $e->getMessage());
    echo "Error en la transacción. Detalles registrados.";
}

mysqli_close($conn);
?>
