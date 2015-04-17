<!doctype html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Estudiantes</title>
        <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
    </head>
    <body>
        <header>
            <h1>Ingresar Estudiantes</h1>
        </header>
        <form class='form'>
            <div class="form-group">
                <label for="id_estudiante" class="required">Id Estudiante</label>
                <input name="Estudiante[id]" id="id_estudiante" type="text" maxlength="10">
            </div>
            <div class="form-group">
                <label for="cedula" class="required">Cédula</label>
                <input name="Estudiante[cedula]" id="cedula" type="text" maxlength="10">
            </div>
            <div class="form-group">
                <label for="nombre" class="required">Nombre</label>
                <input name="Estudiante[nombre]" id="nombre" type="text" maxlength="45">
            </div>
            <div class="form-group">
                <label for="apellido" class="required">Apeliido</label>
                <input name="Estudiante[apellido]" id="id_estudiante" type="text" maxlength="45">
            </div>
            <div class="form-group">
                <label for="direccion" class="required">Dirección</label>
                <input name="Estudiante[direccion]" id="direccion" type="text" maxlength="45">
            </div>
            <div class="form-group">
                <label for="telefono" class="required">Teléfono</label>
                <input name="Estudiante[telefono]" id="telefono" type="text" maxlength="15">
            </div>
            <input type="submit" class="btn btn-success">
            <input type="reset" class="btn btn-danger">
        </form>
        <script src="../assets/js/jquery-2.1.3.js"></script>
        <script src="../assets/plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
    </body>
</html>