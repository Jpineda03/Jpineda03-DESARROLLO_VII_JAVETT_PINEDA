<?php
echo "<pre>";

require_once 'SistemaGestionEstudiantes.php';

// Crear el sistema de gestión
$sistema = new SistemaGestionEstudiantes();

// Crear estudiantes
$estudiante1 = new Estudiante(1, "Ana López", 20, "Ingeniería");
$estudiante2 = new Estudiante(2, "Carlos Gómez", 22, "Medicina");
$estudiante3 = new Estudiante(3, "María Rodríguez", 21, "Derecho");

// Agregar materias a los estudiantes
$estudiante1->agregarMateria("Matemáticas", 85);
$estudiante1->agregarMateria("Física", 90);
$estudiante2->agregarMateria("Biología", 95);
$estudiante2->agregarMateria("Química", 88);
$estudiante3->agregarMateria("Derecho Penal", 75);
$estudiante3->agregarMateria("Derecho Civil", 80);

// Agregar estudiantes al sistema
$sistema->agregarEstudiante($estudiante1);
$sistema->agregarEstudiante($estudiante2);
$sistema->agregarEstudiante($estudiante3);

// Mostrar todos los estudiantes
echo "Lista de estudiantes:\n";
foreach ($sistema->listarEstudiantes() as $estudiante) {
    echo $estudiante . "\n";
}

// Obtener mejor estudiante
$mejorEstudiante = $sistema->obtenerMejorEstudiante();
echo "\nMejor estudiante: " . $mejorEstudiante->obtenerDetalles()['nombre'] . "\n";

// Calcular promedio general
echo "\nPromedio general: " . $sistema->calcularPromedioGeneral() . "\n";

// Graduar estudiante
$sistema->graduarEstudiante(1);

?>
