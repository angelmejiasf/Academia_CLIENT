<?php

include_once './services/AcademiasService.php';

class AcademiasController {

    private $academiasService;

    /**
     * Constructor de la clase AcademiasController.
     * Inicializa el servicio de academias.
     */
    public function __construct() {
        $this->academiasService = new AcademiasService();
    }

    /**
     * Obtiene el nombre de la academia.
     * Utiliza el servicio de academias para realizar una solicitud curl.
     *
     */
    public function obtenerNombreAcademia() {
        // Realiza una solicitud curl a través del servicio de academias
        $academiaData = $this->academiasService->request_curl();
    }
}
