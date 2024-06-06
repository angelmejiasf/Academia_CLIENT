<?php

/**
 * Clase CursosService
 *
 * Esta clase maneja las solicitudes relacionadas con los cursos.
 */
class CursosService {

    /**
     * Realiza una solicitud GET para obtener todos los cursos.
     *
     * @return array|bool Un array de objetos Curso si la solicitud es exitosa, false si hay algún error.
     */
    public function request_curl() {
        $urlmiservicio = "http://localhost/_servWeb/serAcademia/Cursos.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            $cursosData = json_decode($res, true);

            if ($cursosData !== null) {
                $cursos = [];
                foreach ($cursosData as $cursoData) {
                    $curso = new Curso($cursoData);
                    $cursos[] = $curso;
                }
                return $cursos;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Obtiene un curso por su ID.
     *
     * @param int $idcurso ID del curso.
     * @return array|bool Un array con los datos del curso si la solicitud es exitosa, false si hay algún error.
     */
    public function obtenerCursoPorId($idcurso) {
        $urlMiServicio = "http://localhost/_servWeb/serAcademia/Cursos.php?idcurso=" . urlencode($idcurso);

        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            $cursoData = json_decode($res, true);
            error_log("Respuesta del servicio cursos: " . json_encode($cursoData));
            return $cursoData;
        } else {
            error_log("Error al obtener la respuesta del servicio cursos");
            return false;
        }
    }
}

?>
