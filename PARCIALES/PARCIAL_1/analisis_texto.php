<?php
echo "<prev>";

include 'utilidades_texto.php';

echo "<br><br>";

$frases = [
    "Que noche mas larga",
    "Pienso, luego existo",
    "Vamos a la playa"
];

echo "<table border='1'>";
echo "<tr><th>Frase</th><th>Paises</th><th>Vocales</th><th>Palabras</th></tr>";

foreach ($frases as $frase) {
    $paises = ($frase);
    $vocales = ($frase);
    $palabras = ($frase);
    
    echo "<tr>";
    echo "<td>$frase</td>";
    echo "<td>$numpaises</td>";
    echo "<td>$numVocales</td>";
    echo "<td>$invPalabras</td>";
    echo "</tr>";
}

echo "</table>";
?>
