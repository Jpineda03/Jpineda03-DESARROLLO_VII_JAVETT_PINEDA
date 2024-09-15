<?php
echo "<pre>";
require_once 'Gerente.php';
require_once 'Desarrollador.php';
require_once 'Empresa.php';

try {
    // Crear empresa
    $empresa = new Empresa();

    // Crear empleados
    $gerente = new Gerente("Javett", 101, 5000, "Ventas");
    $desarrollador = new Desarrollador("Ana", 102, 3000, "PHP", "Senior");

    // Asignar bono al gerente
    $gerente->asignarBono(1000);

    // Agregar empleados a la empresa
    $empresa->agregarEmpleado($gerente);
    $empresa->agregarEmpleado($desarrollador);

    // Listar empleados
    echo "Empleados:\n";
    $empresa->listarEmpleados();

    // Calcular nómina total
    echo "\nNómina total: $" . $empresa->calcularNominaTotal() . "\n";

    // Evaluar desempeño de empleados
    echo "\nEvaluación de desempeño:\n";
    $empresa->evaluarDesempenioEmpleados();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

