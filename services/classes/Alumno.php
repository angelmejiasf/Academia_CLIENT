<?php

/**
 * Clase Alumno
 *
 * Esta clase representa un alumno y contiene propiedades y métodos
 * para manejar y controlar la información del alumno.
 */
class Alumno {
    /**
     * @var int|null ID del alumno.
     */
    private $idalumno;
    
    /**
     * @var string Nombre del alumno.
     */
    private $nombre;
    
    /**
     * @var string Email del alumno.
     */
    private $email;
    
    /**
     * @var int ID del curso al que pertenece el alumno.
     */
    private $idcurso;

    /**
     * Constructor de la clase Alumno.
     *
     * @param array $assoc Array asociativo con los datos del alumno.
     * @throws Exception Si faltan datos en el array asociativo.
     */
    public function __construct($assoc) {
        if (isset($assoc['idalumno'])) {
            $this->idalumno = $assoc['idalumno'] ?? null;
            $this->nombre = $assoc['nombre'] ?? null;
            $this->email = $assoc['email'] ?? null;
            $this->idcurso = $assoc['idcurso'] ?? null;
        } else {
            throw new Exception("Faltan datos en el array asociativo");
        }
    }

    /**
     * Getter para el ID del alumno.
     *
     * @return int|null ID del alumno.
     */
    public function getIdalumno() {
        return $this->idalumno;
    }

    /**
     * Getter para el nombre del alumno.
     *
     * @return string Nombre del alumno.
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Getter para el email del alumno.
     *
     * @return string Email del alumno.
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Getter para el ID del curso al que pertenece el alumno.
     *
     * @return int ID del curso del alumno.
     */
    public function getIdcurso() {
        return $this->idcurso;
    }

    /**
     * Setter para el ID del alumno.
     *
     * @param int|null $idalumno ID del alumno.
     * 
     */
    public function setIdalumno($idalumno): void {
        $this->idalumno = $idalumno;
    }

    /**
     * Setter para el nombre del alumno.
     *
     * @param string $nombre Nombre del alumno.
     * 
     */
    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    /**
     * Setter para el email del alumno.
     *
     * @param string $email Email del alumno.
     * 
     */
    public function setEmail($email): void {
        $this->email = $email;
    }

    /**
     * Setter para el ID del curso al que pertenece el alumno.
     *
     * @param int $idcurso ID del curso del alumno.
     * 
     */
    public function setIdcurso($idcurso): void {
        $this->idcurso = $idcurso;
    }
}

?>
