<?php
// variables
$nombre = "Javett";
$edad   = "28 años";
$correo = "javett.pineda3@gmail.com";
$telefono = "62682378";

// constante
define("OCUPACION", "Estudiante de Desarrollo de Software");

$mensaje1 = "Hola, mi nombre es " . $nombre . " y tengo " . $edad . " años.";
$mensaje2 = "Soy " . OCUPACION ;

echo $mensaje1 . "<br>";
print($mensaje2 . "<br>");

printf("Mi contacto es: <br>". "Correo: " . $correo . "<br>Celular: " . $telefono);

echo "<br><br>";
var_dump($nombre);
echo "<br>";
var_dump($edad);
echo "<br>";
var_dump($correo);
echo "<br>";
var_dump($telefono);
echo "<br>";
var_dump(OCUPACION);
echo "<br>";
?>