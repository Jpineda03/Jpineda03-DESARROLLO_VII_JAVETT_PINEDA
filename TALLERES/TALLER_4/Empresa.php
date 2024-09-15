<?php
/**
 * Clase Empresa que maneja empleados
 * Puede agregar empleados, listar, calcular nómina y realizar evaluaciones de desempeño
 */
class Empresa {
    private $empleados = [];

    /**
     * Agrega un empleado a la lista de empleados
     */
    public function agregarEmpleado(Empleado $empleado) {
        $this->empleados[] = $empleado;
    }

    /**
     * Lista todos los empleados en la empresa
     */
    public function listarEmpleados() {
        foreach ($this->empleados as $empleado) {
            echo "Nombre: " . $empleado->getNombre() . ", ID: " . $empleado->getIdEmpleado() . ", Salario Base: $" . $empleado->getSalarioBase() . "\n";
        }
    }

    /**
     * Calcula la nómina total de la empresa
     */
    public function calcularNominaTotal() {
        $nominaTotal = 0;
        foreach ($this->empleados as $empleado) {
            if ($empleado instanceof Gerente) {
                $nominaTotal += $empleado->getSalarioTotal();
            } else {
                $nominaTotal += $empleado->getSalarioBase();
            }
        }
        return $nominaTotal;
    }

    /**
     * Evalúa el desempeño de todos los empleados evaluables
     */
    public function evaluarDesempenioEmpleados() {
        foreach ($this->empleados as $empleado) {
            if ($empleado instanceof Evaluable) {
                echo $empleado->evaluarDesempenio() . "\n";
            } else {
                echo "El empleado {$empleado->getNombre()} no puede ser evaluado porque no implementa Evaluable.\n";
            }
        }
    }
}
?>

