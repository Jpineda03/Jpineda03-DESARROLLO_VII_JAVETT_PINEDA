<?php
$pagina = '';
// Función para obtener una lista simulada de libros
function obtenerLibros() {
    // Array simulando una base de datos de libros
    $libros = [
        [
            'titulo' => 'Cien años de soledad',
            'autor' => 'Gabriel García Márquez',
            'anio' => 1967
        ],
        [
            'titulo' => 'Don Quijote de la Mancha',
            'autor' => 'Miguel de Cervantes',
            'anio' => 1605
        ],
        [
            'titulo' => '1984',
            'autor' => 'George Orwell',
            'anio' => 1949
        ],
        [
            'titulo' => 'Matar a un ruiseñor',
            'autor' => 'Harper Lee',
            'anio' => 1960
        ],
        [
            'titulo' => 'Orgullo y prejuicio',
            'autor' => 'Jane Austen',
            'anio' => 1813
        ]
    ];

    return $libros;
}
function mostrarDetallesLibro($libro) {
    // Asegúrate de que el array contenga las claves esperadas
    if (!isset($libro['titulo']) || !isset($libro['autor']) || !isset($libro['anio'])) {
        return 'Detalles incompletos del libro.';
    }

    // Crear una cadena HTML con los detalles del libro
    $html = '<div class="libro-detalles">';
    $html .= '<h2>' . htmlspecialchars($libro['titulo']) . '</h2>';
    $html .= '<p><strong>Autor:</strong> ' . htmlspecialchars($libro['autor']) . '</p>';
    $html .= '<p><strong>Año de publicación:</strong> ' . htmlspecialchars($libro['anio']) . '</p>';
    $html .= '</div>';

    return $html;
}

function generarMenu($paginaActual) {
    $menu = [
        'Mostrar Catalogo' => 'Mostrar Catalogo',
    ];
    
    $html = '<nav><ul>';
    foreach ($menu as $pagina => $titulo) {
        $clase = ($pagina === $paginaActual) ? ' class="activo"' : '';
        $html .= "<li><a href=\"$pagina.php\"$clase>$titulo</a></li>";
    }
    $html .= '</ul></nav>';
    return $html;
}

?>
