<?php

include_once './services/CursosService.php';
include_once './services/AlumnosService.php';

class AlumnosController {

    private $view;
    private $service;
    private $serviceAlumno;

    /**
     * Constructor de la clase AlumnosController.
     * Inicializa los servicios de cursos y alumnos, así como la vista de alumnos.
     */
    public function __construct() {
        $this->view = new AlumnosView();
        $this->service = new CursosService();
        $this->serviceAlumno = new AlumnosService();
    }

    /**
     * Muestra el formulario para insertar un alumno.
     * Obtiene la lista de cursos disponibles y la pasa a la vista.
     */
    public function mostrarFormInsertado() {
        $cursos = $this->service->request_curl();
        $this->view->mostrarFormulario($cursos);
        $this->view->mostrarBotonVuelta();
    }

    /**
     * Inserta un nuevo alumno utilizando los datos recibidos por POST.
     * Muestra el resultado de la operación y un botón de vuelta.
     */
    public function insertarAlumno() {
        try {
            $resultado = $this->serviceAlumno->request_post($_POST["nombre"], $_POST["email"], $_POST["idcurso"]);
            echo $resultado;
            $this->view->mostrarBotonVuelta();
        } catch (Exception $exc) {
            error_log("Excepción capturada: " . $exc->getMessage());
            echo $exc->getMessage();
        }
    }

    /**
     * Obtiene y muestra los alumnos de un curso específico.
     * Utiliza el ID del curso recibido por POST para obtener la lista de alumnos.
     */
    public function obtenerAlumnos() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idcurso'])) {
            $idcurso = $_POST['idcurso'];
            $alumnos = $this->serviceAlumno->obtenerAlumnosPorCurso($idcurso);
            $curso = $this->service->obtenerCursoPorId($idcurso);
            
            if ($curso) {
                $nombreCurso = $curso['nombre'] ?? 'Desconocido';
                error_log("Nombre del curso encontrado: " . $nombreCurso);
            } else {
                $nombreCurso = 'Desconocido';
                error_log("Curso no encontrado para id: " . $idcurso);
            }
            
            $this->view->mostrarTablaAlumnos($alumnos, $nombreCurso);
            $this->view->mostrarBotonVuelta();
            
        } else {
            echo "Por favor, selecciona un curso.";
            $this->view->mostrarBotonVuelta();
        }
    }

    /**
     * Elimina un alumno utilizando el ID recibido por POST.
     * Muestra un botón de vuelta después de la operación.
     */
    public function eliminarAlumno() {
        if (isset($_POST['borrar_alumno'])) {
            $idalumno = $_POST['id_alumno'];
            $this->serviceAlumno->request_delete($idalumno);
            $this->view->mostrarBotonVuelta();
        }
    }
}
?>
