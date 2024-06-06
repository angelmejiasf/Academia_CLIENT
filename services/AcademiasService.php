<?php

require_once __DIR__ . '/classes/Academia.php';

/**
 * Clase AcademiasService
 *
 * Esta clase maneja las solicitudes relacionadas con las academias.
 */
class AcademiasService {

    /**
     * Realiza una solicitud cURL para obtener datos de las academias.
     *
     * @return array|bool Un array de objetos Academia si la solicitud es exitosa, false si hay algún error.
     */
    public function request_curl() {
        $urlMiServicio = "http://localhost/_servWeb/serAcademia/Academias.php";

        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            // Convertir la respuesta JSON a un array asociativo
            $academiasData = json_decode($res, true);

            // Verificar si se obtuvieron las academias correctamente
            if ($academiasData !== null) {
                // Crear objetos Academia a partir de los datos obtenidos
                $academias = [];
                foreach ($academiasData as $academiaData) {
                    $academia = new Academia($academiaData);
                    $academias[] = $academia;
                }
                return $academias;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

?>
