<?php

include_once './views/HomeView.php';
include_once './services/CursosService.php';

class HomeController {

    private $view;
    private $service;

    /**
     * Constructor de la clase HomeController.
     * Inicializa la vista de Home y el servicio de Cursos.
     */
    public function __construct() {
        $this->view = new HomeView();
        $this->service = new CursosService();
    }

    /**
     * Muestra la página principal (home).
     * Obtiene la lista de cursos mediante el servicio de Cursos y la pasa a la vista para su renderizado.
     */
    public function mostrarHome() {
        $cursos = $this->service->request_curl();
        $this->view->mostrarHome($cursos);
    }
    
    /**
     * Muestra el contenido principal de la página home.
     * No recibe ni devuelve ningún parámetro.
     */
    public function homePrincipal(){
        $this->view->HomePrincipal();
    }
}
