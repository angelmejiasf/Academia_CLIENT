<?php

/**
 * Clase Curso
 *
 * Esta clase representa un curso y contiene propiedades y métodos
 * para manejar y controlar la información del curso.
 */
class Curso {
    /**
     * @var int|null ID del curso.
     */
    private $idcurso;
    
    /**
     * @var string Nombre del curso.
     */
    private $nombre;
    
    /**
     * @var string Fecha de creación del curso.
     */
    private $fechacreacion;
    
    /**
     * @var int ID de la academia a la que pertenece el curso.
     */
    private $idacademia;
    
    /**
     * Constructor de la clase Curso.
     *
     * @param array $assoc Array asociativo con los datos del curso.
     * @throws Exception Si faltan datos en el array asociativo.
     */
    public function __construct($assoc) {
        if (isset($assoc['idcurso']) && isset($assoc['nombre']) && isset($assoc['fechacreacion']) && isset($assoc['idacademia'])) {
            $this->idcurso = $assoc['idcurso'] ?? null;
            $this->nombre = $assoc['nombre'] ?? null;
            $this->fechacreacion = $assoc['fechacreacion'] ?? null;
            $this->idacademia = $assoc['idacademia'] ?? null;
        } else {
            throw new Exception("Faltan datos en el array asociativo");
        }
    }
    
    /**
     * Getter para el ID del curso.
     *
     * @return int|null ID del curso.
     */
    public function getIdcurso() {
        return $this->idcurso;
    }

    /**
     * Getter para el nombre del curso.
     *
     * @return string Nombre del curso.
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Getter para la fecha de creación del curso.
     *
     * @return string Fecha de creación del curso.
     */
    public function getFechacreacion() {
        return $this->fechacreacion;
    }

    /**
     * Getter para el ID de la academia del curso.
     *
     * @return int ID de la academia del curso.
     */
    public function getIdacademia() {
        return $this->idacademia;
    }

    /**
     * Setter para el ID del curso.
     *
     * @param int|null $idcurso ID del curso.
     * 
     */
    public function setIdcurso($idcurso): void {
        $this->idcurso = $idcurso;
    }

    /**
     * Setter para el nombre del curso.
     *
     * @param string $nombre Nombre del curso.
     * 
     */
    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    /**
     * Setter para la fecha de creación del curso.
     *
     * @param string $fechacreacion Fecha de creación del curso.
     * 
     */
    public function setFechacreacion($fechacreacion): void {
        $this->fechacreacion = $fechacreacion;
    }

    /**
     * Setter para el ID de la academia del curso.
     *
     * @param int $idacademia ID de la academia del curso.
     * 
     */
    public function setIdacademia($idacademia): void {
        $this->idacademia = $idacademia;
    }
}

?>
