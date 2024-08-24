<?php
$calificacion = 100

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

if ($calificacion >= 60) {
    $resultado = "Aprobado";
} else {
    $resultado = "Reprobado";
}
echo "calificación: $calificacion <br>";
echo "Resultado (if-else): $resultado<br>";
?>