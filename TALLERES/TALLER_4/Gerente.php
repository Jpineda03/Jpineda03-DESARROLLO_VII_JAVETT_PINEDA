<?php
require_once 'Empleado.php';
require_once 'Evaluable.php';

/**
 * Clase Gerente que hereda de Empleado
 * Añade propiedades y métodos específicos de los gerentes
 */
class Gerente extends Empleado implements Evaluable {
    private $departamento;
    private $bono;

    /**
     * Constructor que inicializa las propiedades del Gerente
     */
    public function __construct($nombre, $idEmpleado, $salarioBase, $departamento) {
        parent::__construct($nombre, $idEmpleado, $salarioBase);
        $this->departamento = $departamento;
        $this->bono = 0; // Bono inicial es cero
    }

    // Método para asignar bono al gerente
    public function asignarBono($bono) {
        $this->bono = $bono;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    /**
     * Calcula el salario total del gerente (salario base + bono)
     */
    public function getSalarioTotal() {
        return $this->salarioBase + $this->bono;
    }

    // Implementación de la interfaz Evaluable
    public function evaluarDesempenio() {
        return "La gerente {$this->nombre} gestiona el departamento de {$this->departamento} y tiene un desempeño satisfactorio.";
    }
}
?>
