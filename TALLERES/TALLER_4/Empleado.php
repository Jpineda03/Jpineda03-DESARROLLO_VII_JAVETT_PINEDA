<?php
/**
 * Clase base Empleado
 * Define las propiedades y métodos comunes para todos los empleados
 */
class Empleado {
    // Propiedades protegidas para asegurar la encapsulación
    protected $nombre;
    protected $idEmpleado;
    protected $salarioBase;

    /**
     * Constructor para inicializar las propiedades de Empleado
     */
    public function __construct($nombre, $idEmpleado, $salarioBase) {
        $this->nombre = $nombre;
        $this->idEmpleado = $idEmpleado;
        $this->salarioBase = $salarioBase;
    }

    // Métodos getter para acceder a las propiedades
    public function getNombre() {
        return $this->nombre;
    }

    public function getIdEmpleado() {
        return $this->idEmpleado;
    }

    public function getSalarioBase() {
        return $this->salarioBase;
    }

    // Métodos setter para modificar las propiedades
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    public function setSalarioBase($salarioBase) {
        $this->salarioBase = $salarioBase;
    }
}
?>

