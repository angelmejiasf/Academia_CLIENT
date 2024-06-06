<?php

include_once './services/CursosService.php';
include_once './services/AcademiasService.php';

class CursosController {

    private $view;
    private $service;
    private $academiasService;
    private $alumnosService;

    /**
     * Constructor de la clase CursosController.
     * Inicializa los servicios de cursos, academias y alumnos, así como la vista de cursos.
     */
    public function __construct() {
        $this->view = new CursosView();
        $this->service = new CursosService();
        $this->academiasService = new AcademiasService();
        $this->alumnosService = new AlumnosService();
    }

    /**
     * Muestra todos los cursos disponibles.
     * Obtiene la lista de cursos, la información de las academias y el conteo de alumnos por curso.
     * Pasa estos datos a la vista para su renderizado.
     */
    public function mostrarTodosLosCursos() {
        $cursos = $this->service->request_curl();
        $academiaData = $this->academiasService->request_curl();
        $conteoAlumnos = $this->alumnosService->obtenerConteoAlumnosPorCurso();

        $this->view->mostrarTodosLosCursos($cursos, $academiaData, $conteoAlumnos);
        $this->view->mostrarBotonVuelta();
    }
}
