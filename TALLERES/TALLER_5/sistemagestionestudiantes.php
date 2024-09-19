<?php

require_once 'Estudiante.php';

class SistemaGestionEstudiantes {
    private $estudiantes = [];
    private $graduados = [];

    public function __construct() {
        $this->estudiantes = [];
        $this->graduados = [];
    }

    public function agregarEstudiante(Estudiante $estudiante) {
        $this->estudiantes[$estudiante->obtenerDetalles()['id']] = $estudiante;
    }

    public function obtenerEstudiante($id) {
        return $this->estudiantes[$id] ?? null;
    }

    public function listarEstudiantes() {
        return $this->estudiantes;
    }

    public function calcularPromedioGeneral() {
        $totalPromedio = array_sum(array_map(function($estudiante) {
            return $estudiante->obtenerPromedio();
        }, $this->estudiantes));

        return count($this->estudiantes) > 0 ? $totalPromedio / count($this->estudiantes) : 0;
    }

    public function obtenerEstudiantesPorCarrera($carrera) {
        return array_filter($this->estudiantes, function($estudiante) use ($carrera) {
            return $estudiante->obtenerDetalles()['carrera'] === $carrera;
        });
    }

    public function obtenerMejorEstudiante() {
        if (empty($this->estudiantes)) {
            return null; // No hay estudiantes
        }
    
        return array_reduce($this->estudiantes, function($mejor, $estudiante) {
            if ($mejor === null || $estudiante->obtenerPromedio() > $mejor->obtenerPromedio()) {
                return $estudiante;
            }
            return $mejor;
        });
    }    

    public function generarRanking() {
        usort($this->estudiantes, function($a, $b) {
            return $b->obtenerPromedio() <=> $a->obtenerPromedio();
        });
        return $this->estudiantes;
    }

    public function graduarEstudiante($id) {
        // Verificar si el estudiante existe
        if (isset($this->estudiantes[$id])) {
            // Mover el estudiante a la lista de graduados
            $this->graduados[$id] = $this->estudiantes[$id];
            // Eliminar el estudiante de la lista de estudiantes activos
            unset($this->estudiantes[$id]);
            echo "El estudiante con ID $id ha sido graduado.\n";
        } else {
            echo "Estudiante con ID $id no encontrado.\n";
        }
    }
    
    public function listarGraduados() {
        return $this->graduados;
    }

}

?>
