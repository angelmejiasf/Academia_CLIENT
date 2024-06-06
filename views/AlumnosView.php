<?php

/**
 * Clase AlumnosView
 *
 * Esta clase se encarga de mostrar la interfaz relacionada con los alumnos.
 */
class AlumnosView {

    /**
     * Muestra el formulario para insertar un alumno.
     *
     * @param array $cursos Lista de cursos disponibles.
     * 
     */
    public function mostrarFormulario($cursos) {
        echo "<h2>Insertar Alumno</h2>";
        echo "<form method='post' action='index.php?controller=Alumnos&action=insertarAlumno' class='pasaje-form'>";
        echo "<label class='clase-label'>Alumno</label><br>";
        echo "<input type='text' name='nombre'><br>";

        echo "<label class='clase-label'>Email</label><br>";
        echo "<input type='email' name='email'><br>";

        echo "<label class='clase-label'>Seleeciona curso</label><br>";
        echo "<select name='idcurso'>";
        foreach ($cursos as $curso) {
            echo "<option value='" . $curso->getIdcurso() . "'>" . $curso->getNombre();
        }

        echo "</select><br>";

        echo "<input type='submit' value='Insertar' class='submit-btn'>";
        echo "</form>";
    }

    /**
     * Muestra una tabla con los alumnos del curso.
     *
     * @param array|bool $alumnos Lista de alumnos del curso.
     * @param string $nombreCurso Nombre del curso.
     * 
     */
    public function mostrarTablaAlumnos($alumnos, $nombreCurso) {
        echo "<h2>Listado de alumnos del curso: $nombreCurso</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID Alumno</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr>";

        if ($alumnos) {
            foreach ($alumnos as $alumno) {
                echo "<tr>";
                echo "<td>{$alumno->getIdalumno()}</td>";
                echo "<td>{$alumno->getNombre()}</td>";
                echo "<td>{$alumno->getEmail()}</td>";
                echo "<td>";
                echo "<form action='index.php?controller=Alumnos&action=eliminarAlumno' method='post' style='display:inline;'>";
                echo "<input type='hidden' name='id_alumno' value='{$alumno->getIdalumno()}'>";
                echo "<input type='submit' name='borrar_alumno' value='Borrar' class='submit-btn'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay alumnos en este curso.</td></tr>";
        }

        echo "</table>";
    }

    /**
     * Muestra un botón para volver al home.
     *
     * 
     */
    public function mostrarBotonVuelta() {

        echo '<form action="index.php" method="post">';
        echo "<button class='volver-btn'>Volver al home</button>";
        echo "</form>";
    }
}

?>
