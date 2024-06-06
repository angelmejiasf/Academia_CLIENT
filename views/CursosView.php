<?php

/**
 * Clase CursosView
 *
 * Esta clase se encarga de mostrar la interfaz relacionada con los cursos.
 */
class CursosView {

    /**
     * Muestra todos los cursos en forma de tabla.
     *
     * @param array $cursos Lista de cursos disponibles.
     * @param array $academiaData Datos de las academias asociadas a los cursos.
     * @param array $conteoAlumnos Conteo de alumnos por curso.
     */
    public function mostrarTodosLosCursos($cursos, $academiaData, $conteoAlumnos) {
        echo "<h2>Cursos</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID Curso</th><th>Nombre</th><th>Fecha Creacion</th><th>Nombre Academia</th><th>NºAlumnos</th></tr>";

        foreach ($cursos as $curso) {
            echo "<tr>";
            echo "<td>{$curso->getIdcurso()}</td>";
            echo "<td>{$curso->getNombre()}</td>";
            echo "<td>{$curso->getFechacreacion()}</td>";

            $nombreAcademia = "No encontrado";
            foreach ($academiaData as $academia) {
                if ($academia->getIdacademia() == $curso->getIdacademia()) {
                    $nombreAcademia = $academia->getNombre();
                    break;
                }
            }

            echo "<td>{$nombreAcademia}</td>";
            
            $conteo = isset($conteoAlumnos[$curso->getIdcurso()]) ? $conteoAlumnos[$curso->getIdcurso()] : 0;
            echo "<td>{$conteo}</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    
    /**
     * Muestra un botón para volver al home.
     *
     */
    public function mostrarBotonVuelta() {

        echo '<form action="index.php" method="post">';
        echo "<button class='volver-btn'>Volver al home</button>";
        echo "</form>";
    }
}

?>
