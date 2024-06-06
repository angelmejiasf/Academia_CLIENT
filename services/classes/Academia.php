<?php

/**
 * Clase Academia
 *
 * Esta clase representa una academia y contiene propiedades y métodos
 * para manipular y controlar la información de la academia.
 */
class Academia {
    /**
     * @var int|null ID de la academia.
     */
    private $idacademia;
    
    /**
     * @var string Nombre de la academia.
     */
    private $nombre;
    
    /**
     * @var string Dirección de la academia.
     */
    private $direccion;
    
    /**
     * @var string Teléfono de la academia.
     */
    private $telefono;

    /**
     * Constructor de la clase Academia.
     *
     * @param array $assoc Array asociativo con los datos de la academia.
     * @throws Exception Si faltan datos en el array asociativo.
     */
    public function __construct($assoc) {
        if (isset($assoc['idacademia']) && isset($assoc['nombre']) && isset($assoc['direccion']) && isset($assoc['telefono'])) {
            $this->idacademia = $assoc['idacademia'] ?? null;
            $this->nombre = $assoc['nombre'] ?? null;
            $this->direccion = $assoc['direccion'] ?? null;
            $this->telefono = $assoc['telefono'] ?? null;
        } else {
            throw new Exception("Faltan datos en el array asociativo");
        }
    }

    /**
     * Getter para el ID de la academia.
     *
     * @return int|null ID de la academia.
     */
    public function getIdacademia() {
        return $this->idacademia;
    }

    /**
     * Getter para el nombre de la academia.
     *
     * @return string Nombre de la academia.
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Getter para la dirección de la academia.
     *
     * @return string Dirección de la academia.
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     * Getter para el teléfono de la academia.
     *
     * @return string Teléfono de la academia.
     */
    public function getTelefono() {
        return $this->telefono;
    }

    /**
     * Setter para el ID de la academia.
     *
     * @param int|null $idacademia ID de la academia.
     * 
     */
    public function setIdacademia($idacademia): void {
        $this->idacademia = $idacademia;
    }

    /**
     * Setter para el nombre de la academia.
     *
     * @param string $nombre Nombre de la academia.
     * 
     */
    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    /**
     * Setter para la dirección de la academia.
     *
     * @param string $direccion Dirección de la academia.
     * 
     */
    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    /**
     * Setter para el teléfono de la academia.
     *
     * @param string $telefono Teléfono de la academia.
     * 
     */
    public function setTelefono($telefono): void {
        $this->telefono = $telefono;
    }
}

?>
