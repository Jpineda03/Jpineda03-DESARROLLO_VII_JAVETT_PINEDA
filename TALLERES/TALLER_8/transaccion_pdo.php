<?php
require_once "config_pdo.php";

// Función para registrar errores en un archivo de log
function log_error($error_message) {
    $log_file = 'error_log.txt'; // Cambia el nombre si lo necesitas
    $timestamp = date("Y-m-d H:i:s");
    file_put_contents($log_file, "[$timestamp] $error_message" . PHP_EOL, FILE_APPEND);
}

try {
    $pdo->beginTransaction();

    // Insertar un nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nombre' => 'Nuevo Usuario', ':email' => 'nuevo@example.com']);
    
    if ($stmt->rowCount() === 0) {
        throw new Exception("No se insertó el usuario.");
    }

    $usuario_id = $pdo->lastInsertId();

    // Insertar una publicación para ese usuario
    $sql = "INSERT INTO publicaciones (usuario_id, titulo, contenido) VALUES (:usuario_id, :titulo, :contenido)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':usuario_id' => $usuario_id,
        ':titulo' => 'Nueva Publicación',
        ':contenido' => 'Contenido de la nueva publicación'
    ]);

    if ($stmt->rowCount() === 0) {
        throw new Exception("No se insertó la publicación.");
    }

    $pdo->commit();
    echo "Transacción completada con éxito.";
} catch (Exception $e) {
    $pdo->rollBack();
    log_error("Error en la transacción: " . $e->getMessage());
    echo "Error en la transacción. Detalles registrados.";
}
?>
