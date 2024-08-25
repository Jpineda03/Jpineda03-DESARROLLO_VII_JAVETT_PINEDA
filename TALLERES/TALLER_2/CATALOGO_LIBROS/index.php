<?php
$paginaActual = 'Inicio';
$pagina = '';
// Incluir el archivo de funciones
include './includes/funciones.php';

$tituloPagina = 'Catálogo de libros';
// Incluir el archivo de encabezado
include './includes/header.php';

// Obtener la lista de libros
$libros = obtenerLibros();

// Mostrar la lista de libros
echo "<ul>";
foreach ($libros as $libro) {
    echo "<li>";
    // Mostrar los detalles de cada libro utilizando la función mostrarDetallesLibro()
    echo mostrarDetallesLibro($libro);
    echo "</li>";
}
echo "</ul>";

// Incluir el archivo de pie de página
include './includes/footer.php';
?>
