<?php
$errores = []; // Inicializamos un array para almacenar los errores.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitización de datos
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $fecha_nacimiento = filter_input(INPUT_POST, 'fecha_nacimiento', FILTER_SANITIZE_STRING);
    $edad = filter_input(INPUT_POST, 'edad', FILTER_SANITIZE_NUMBER_INT);
    $sitio_web = filter_input(INPUT_POST, 'sitio_web', FILTER_SANITIZE_URL);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $intereses = filter_input(INPUT_POST, 'intereses', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    $comentarios = filter_input(INPUT_POST, 'comentarios', FILTER_SANITIZE_STRING);
    
    // Validaciones
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email es obligatorio y debe ser válido.";
    }
    if (empty($fecha_nacimiento)) {
        $errores[] = "La fecha de nacimiento es obligatoria.";
    }
    if (empty($edad)) {
        $errores[] = "La edad es obligatoria.";
    }

    // Manejo de la foto de perfil
    $foto_perfil = $_FILES['foto_perfil'];
    $nombre_foto = uniqid() . '-' . basename($foto_perfil['name']);
    $ruta_destino = 'uploads/' . $nombre_foto; // Cambia esta ruta según tus necesidades

    if ($foto_perfil['error'] === UPLOAD_ERR_OK) {
        if (!move_uploaded_file($foto_perfil['tmp_name'], $ruta_destino)) {
            $errores[] = "Error al subir la foto.";
        }
    } else {
        $errores[] = "Error en la carga del archivo de foto.";
    }

    // Verifica si hay errores antes de guardar
    if (empty($errores)) {
        // Guardar en un archivo JSON
        $datos = [
            'nombre' => $nombre,
            'email' => $email,
            'fecha_nacimiento' => $fecha_nacimiento,
            'edad' => $edad,
            'sitio_web' => $sitio_web,
            'genero' => $genero,
            'intereses' => $intereses,
            'comentarios' => $comentarios,
            'foto_perfil' => $ruta_destino
        ];

        // Cargar los registros existentes
        $registros = [];
        if (file_exists('registros.json')) {
            $registros = json_decode(file_get_contents('registros.json'), true);
        }
        $registros[] = $datos;

        // Guardar en el archivo JSON
        file_put_contents('registros.json', json_encode($registros, JSON_PRETTY_PRINT));
        
        // Mostrar los datos recibidos
        echo "<h2>Datos Recibidos:</h2>";
        echo "<table border='1'>";
        foreach ($datos as $campo => $valor) {
            echo "<tr>";
            echo "<th>" . ucfirst($campo) . "</th>";
            if ($campo === 'intereses') {
                echo "<td>" . implode(", ", $valor) . "</td>";
            } elseif ($campo === 'foto_perfil') {
                echo "<td><img src='$valor' width='100'></td>";
            } else {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Mostrar los errores
        echo "<h2>Errores:</h2>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
} else {
    echo "Método de solicitud no válido.";
}

echo "<br><a href='formulario.html'>Volver al formulario</a>";
?>
