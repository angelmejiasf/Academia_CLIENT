<?php

require_once __DIR__ . '/classes/Alumno.php';

/**
 * Clase AlumnosService
 *
 * Esta clase maneja las solicitudes relacionadas con los alumnos.
 */
class AlumnosService {

    /**
     * Realiza una solicitud POST para insertar un nuevo alumno.
     *
     * @param string $nombre Nombre del alumno.
     * @param string $email Email del alumno.
     * @param int $idcurso ID del curso al que se matricula el alumno.
     *
     */
    function request_post($nombre, $email, $idcurso) {
        $envio = json_encode(array(
            "nombre" => $nombre,
            "email" => $email,
            "idcurso" => $idcurso
        ));

        $urlmiservicio = "http://localhost/_servWeb/serAcademia/Alumnos.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($conexion, CURLOPT_POST, TRUE);
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);

        // Decodificar la respuesta JSON
        $respuesta = json_decode($res, true);

        echo $respuesta['resultado'];
    }

    /**
     * Obtiene el conteo de alumnos por curso.
     *
     * @return array|bool Un array con el conteo de alumnos por curso si la solicitud es exitosa, false si hay algún error.
     */
    function obtenerConteoAlumnosPorCurso() {
        $urlMiServicio = "http://localhost/_servWeb/serAcademia/Alumnos.php?accion=contar";

        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            $conteoAlumnos = json_decode($res, true);
            return $conteoAlumnos;
        } else {
            return false;
        }
    }

    /**
     * Obtiene los alumnos de un curso específico.
     *
     * @param int $idcurso ID del curso.
     * @return array|bool Un array de objetos Alumno si la solicitud es exitosa, false si hay algún error.
     */
    public function obtenerAlumnosPorCurso($idcurso) {
        $urlMiServicio = "http://localhost/_servWeb/serAcademia/Alumnos.php?idcurso=" . urlencode($idcurso);

        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            $alumnosData = json_decode($res, true);

            if ($alumnosData !== null) {
                $alumnos = [];
                foreach ($alumnosData as $alumnoData) {
                    $alumno = new Alumno($alumnoData);
                    $alumnos[] = $alumno;
                }
                return $alumnos;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Realiza una solicitud DELETE para eliminar un alumno.
     *
     * @param int $idalumno ID del alumno a eliminar.
     * 
     */
    public function request_delete($idalumno) {

        $urlMiServicio = "http://localhost/_servWeb/serAcademia/Alumnos.php?idalumno=" . $idalumno;

        // Inicializar la conexión cURL
        $conexion = curl_init();

        // Configurar la URL y el método de la solicitud
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        // Realizar la solicitud y recibir la respuesta
        $res = curl_exec($conexion);

        // Verificar si se realizó la eliminación correctamente
        if ($res) {
            // Mostrar el mensaje de respuesta obtenido
            echo $res;
        }

        // Cerrar la conexión cURL
        curl_close($conexion);
    }
}

?>
