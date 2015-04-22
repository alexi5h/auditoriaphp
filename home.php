<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="en"> <!--<![endif]-->

    <head>
        <meta charset="utf-8" />
        <title>Auditoría PHP</title>
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
    </head>

    <body>
        <h2>Bienvenido 
            <?php
            session_start();
            echo $_SESSION['usuario'];
            ?>
        </h2>
        <h3>Sistema de auditoría</h3>
        <a href="CRUD/Estudiantes.php"><button id="btn_estudiantes" class="btn btn-primary">Estudiantes</button></a>
        <a href="CRUD/materias.php"><button id="btn_materias" class="btn btn-primary">Materias</button></a>
        <a href="CRUD/Notas.php"><button id="btn_notas" class="btn btn-primary">Notas</button></a>
        <a href="CRUD/Usuarios.php"><button id="btn_usuarios" class="btn btn-primary">Usuarios</button></a>
        <a href="CRUD/Auditoria.php"><button id="btn_auditoria" class="btn btn-info">Detalle Auditoría</button></a>

        <a href="auditoria/cerrar_sesion.php"><button id="btn_logout" class="btn btn-default">Cerrar Sesión</button></a>
        <script src="assets/js/jquery-2.1.3.js"></script>
        <script src="assets/plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    </body>