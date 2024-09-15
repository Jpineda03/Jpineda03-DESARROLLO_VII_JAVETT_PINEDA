<?php
require_once 'Empleado.php';
require_once 'Evaluable.php';

/**
 * Clase Desarrollador que hereda de Empleado
 * Añade propiedades y métodos específicos de los desarrolladores
 */
class Desarrollador extends Empleado implements Evaluable {
    private $lenguajePrincipal;
    private $nivelExperiencia;

    /**
     * Constructor que inicializa las propiedades del Desarrollador
     */
    public function __construct($nombre, $idEmpleado, $salarioBase, $lenguajePrincipal, $nivelExperiencia) {
        parent::__construct($nombre, $idEmpleado, $salarioBase);
        $this->lenguajePrincipal = $lenguajePrincipal;
        $this->nivelExperiencia = $nivelExperiencia;
    }

    // Getters para acceder a las propiedades específicas del desarrollador
    public function getLenguajePrincipal() {
        return $this->lenguajePrincipal;
    }

    public function getNivelExperiencia() {
        return $this->nivelExperiencia;
    }

    // Implementación de la interfaz Evaluable
    public function evaluarDesempenio() {
        return "El desarrollador {$this->nombre} ha demostrado un desempeño sobresaliente en {$this->lenguajePrincipal}.";
    }
}
?>

