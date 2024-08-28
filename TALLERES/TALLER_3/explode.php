
<?php
// Ejemplo de uso de explode()
echo "<pre>";
$frase = "Manzana,Naranja,Plátano,Uva";
$frutas = explode(",", $frase);

echo "Frase original: $frase <br>
";
echo "Array de frutas:
";
print_r($frutas);

// Ejercicio: Crea una variable con una lista de tus 5 películas favoritas separadas por guiones (-)
// y usa explode() para convertirla en un array
$misPeliculas = "Harry Potter - Maze Runner - El Viaje de Chihiro - El castillo ambulante de Howl - Resident Evil"; // Reemplaza esto con tu lista de películas
$arrayPeliculas = explode("-", $misPeliculas);

echo "
<br>Mis películas favoritas:
";
print_r($arrayPeliculas);

// Bonus: Usa explode() con un límite
$texto = "Uno,Dos,Tres,Cuatro,Cinco";
$array = explode(",", $texto, 3);

echo "
Texto original: $texto
";
echo "Array con límite:
";
print_r($array);
?>
      
