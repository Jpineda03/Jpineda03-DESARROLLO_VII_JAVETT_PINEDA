<?php
$host = "localhost";
$user = "root"; // Cambia esto según tu configuración
$password = "pty96"; // Cambia esto según tu configuración
$dbname = "biblioteca";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
