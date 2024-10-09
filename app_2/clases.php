<?php

interface Prestable {

    public function obtenerDetallesPretamo(): string;
}
abstract class RecursoBiblioteca implements Prestable {
    public $id;
    public $titulo;
    public $autor;
    public $anioPublicacion;
    public $estado;
    public $fechaAdquisicion;
    public $tipo;
    public $detallesEspecificos;

    public function __construct($datos) {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}

public class RecursoBiblioteca implements Prestable{
    public function 
}

class libro extends RecursosBibliteca {
    public $isbn;

    public function obtenerDetallesPretamo(): string;
    
}
class revista extends RecursosBibliteca {
    public $numeroEdicion;
    
    public function obtenerDetallesPretamo(): string;
}
class DVD extends RecursosBibliteca {
    public $duracion;

    public function obtenerDetallesPretamo(): string;
}
// Implementar las clases Libro, Revista y DVD aquí

class GestorBiblioteca {
    private $recursos = [];

    public function cargarRecursos() {
        $json = file_get_contents('biblioteca.json');
        $data = json_decode($json, true);
        
        foreach ($data as $recursoData) {
            switch ($recurso['tipo']) {
                case 'Libro';
                $recurso = new Libro($recursoData);
                    break;
                case 'Revista';
                $recurso = new Revista($recursoData);
                    break;
                case 'DVD';
                $recurso = new DVD($recursoData);
                    break;
            }
            $recurso = new RecursoBiblioteca($recursoData);
            $this->recursos[] = $recurso;
        }
        
        return $this->recursos;
    }

    // Implementar los demás métodos aquí
    public function agregarRecurso ($recurso){
        $tipo = $input ['tipo'];
        $recurso = null;
        switch($tipo){
            case 'Libro';
            $recurso = new Libro ($input);
            break;
            case 'Revista';
            $recurso = new Revista ($input);
            break;
            case 'DVD';
            $recurso = new DVD ($input);
            break;
        }

        if ($recurso ! = null);
        $this -> recursos[]= $recurso;
        file_put_contents('biblioteca.json', json_encode) $recurso;

    }


}