<?php
$calificacion = 100;

// Evaluación de calificación usando if-else
if ($calificacion >= 90) {
    echo "Tu calificación es A.<br>";
} elseif ($calificacion >= 80) {
    echo "Tu calificación es B.<br>";
} elseif ($calificacion >= 70) {
    echo "Tu calificación es C.<br>";
} elseif ($calificacion >= 60) {
    echo "Tu calificación es D.<br>";
} else {
    echo "Tu calificación es F.<br>";
}
echo "<br>";

// Evaluación del resultado aprobado/reprobado
if ($calificacion >= 60) {
    $resultado = "Aprobado";
} else {
    $resultado = "Reprobado";
}
echo "Calificación: $calificacion <br>";
echo "Resultado: $resultado<br>";

// Evaluación de la calificación usando switch
switch (true) {
    case ($calificacion >= 90):
        echo "Excelente trabajo.<br>";
        break;
    case ($calificacion >= 80):
        echo "Buen trabajo.<br>";
        break;
    case ($calificacion >= 70):
        echo "Trabajo aceptable.<br>";
        break;
    case ($calificacion >= 60):
        echo "Necesitas mejorar.<br>";
        break;
    default:
        echo "Debes esforzarte más.<br>";
}
?>
