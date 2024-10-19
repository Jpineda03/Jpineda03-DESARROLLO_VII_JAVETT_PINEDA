<?php
require_once "libros.php";
require_once "usuarios.php";
require_once "prestamos.php";

$listadoLibros = listarLibros();
$listadoUsuarios = listarUsuarios();
$listadoPrestamos = listarPrestamos();

echo "<h1>Sistema de Gestión de Biblioteca - PDO</h1>";
echo "<h2>Libros</h2>";
foreach ($listadoLibros as $libro) {
    echo "Título: {$libro['titulo']}, Autor: {$libro['autor']}<br>";
}

echo "<h2>Usuarios</h2>";
foreach ($listadoUsuarios as $usuario) {
    echo "Nombre: {$usuario['nombre']}<br>";
}

echo "<h2>Préstamos</h2>";
foreach ($listadoPrestamos as $prestamo) {
    echo "Usuario: {$prestamo['usuario']}, Libro: {$prestamo['libro']}<br>";
}
?>
