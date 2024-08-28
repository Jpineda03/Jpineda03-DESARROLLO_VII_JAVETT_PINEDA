
<?php
// Ejemplo de uso de str_replace()
$frase = "El gato morado saltó sobre mi perro morado<br>";
$fraseModificada = str_replace("morado", "amarillo", $frase);

echo "Frase original:  $frase
";
echo "Frase modificada: $fraseModificada
<br>";

// Ejercicio: Crea una variable con una frase que contenga al menos tres veces la palabra "PHP"
// y usa str_replace() para cambiar "PHP" por "JavaScript"
$miFrase = "Durante la clase daremos PHP, pero ¿Qué Significa PHP?, es un lenguaje de programación ampliamente utilizado, especialmente en el desarrollo web. Por ello aprenderemos PHP hoy! "; // Reemplaza esto con tu frase
$miFraseModificada = str_replace("PHP", "JavaScript", $miFrase);

echo "
Mi frase original: $miFrase <br>
";
echo "Mi frase modificada: $miFraseModificada <br>
<br>";

// Bonus: Usa str_replace() para reemplazar múltiples palabras a la vez
$texto = "Manzanas y naranjas son frutas. Me gustan las Manzanas y las naranjas.";
$buscar = ["Manzanas", "naranjas"];
$reemplazar = ["PIÑAS", "KIWIS"];
$textoModificado = str_replace($buscar, $reemplazar, $texto);

echo "
Texto original: $texto <br>
";
echo "Texto modificado: $textoModificado
";
?>
          
