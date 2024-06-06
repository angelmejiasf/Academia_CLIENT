<?php

/**
 * Clase HomeView
 *
 * Esta clase se encarga de mostrar la interfaz relacionada con la página principal (home).
 */
class HomeView {

    /**
     * Muestra el formulario para seleccionar un curso y mostrar los alumnos.
     *
     * @param array $cursos Lista de cursos disponibles para seleccionar.
     */
    public function mostrarHome($cursos) {
        $selectedCursoId = isset($_POST['idcurso']) ? $_POST['idcurso'] : '';

        echo "<form action='index.php?controller=Alumnos&action=obtenerAlumnos' method='post'>";
        echo '<label tabindex="-1" aria-disabled="true">Selecciona curso</label>';
        echo "<select name='idcurso'>";
        foreach ($cursos as $curso) {
            $selected = $curso->getIdcurso() == $selectedCursoId ? 'selected' : '';
            echo "<option value='" . $curso->getIdcurso() . "' " . $selected . ">" . $curso->getNombre() . "</option>";
        }
        echo "</select>";
        echo "<input type='submit' value='Mostrar Alumnos' class='submit-btn'>";
        echo "</form>";
    }

    /**
     * Muestra la página principal de la academia.
     *
     */
    public function HomePrincipal() {
        echo'<div class="container">';
        echo '<h1>Academia</h1>';
        echo '<p>Ángel Mejías</p>';
        echo '</div>';
    }
}

?>
