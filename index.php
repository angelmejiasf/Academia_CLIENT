<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./css/estilo.css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <?php
        include_once './controllers/HomeController.php';
        include_once './services/classes/Curso.php';
        $homeController = new HomeController();
        ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Academia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=Cursos&action=mostrarTodosLosCursos">Ver los cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=Alumnos&action=mostrarFormInsertado">Matricular Alumnos</a>
                    </li>
                    <li class="nav-item">
                        <form action="index.php?controller=Alumnos&action=obtenerAlumnos" method="post">
                            <?php $homeController->mostrarHome(); ?>

                        </form>

                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <?php
            include 'frontcontroller.php';
            ?>
        </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
