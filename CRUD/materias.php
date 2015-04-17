<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Materias</title>
    <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
</head>
<body>
<header>
    <h1>Ingresar Materias</h1>
</header>
<form class='form' >
    <div class="form-group"><label for="id_materia" class="required">Id Materia</label>
        <input name="Materia[id]" id="id_materia" type="text" maxlength="50"></div>
    <div class="form-group"><label for="materia_nombre" class="required">Nombre Materia</label>
        <input name="Materia[nombre]" id="materia_nombre" type ="text"  maxlength="50"></div>
    <div><input type="submit" class="btn btn-success"></div>
    <div><input type="reset" class="btn btn-danger"></div>

</form>
<script src="../assets/js/jquery-2.1.3.js"></script>
<script src="../assets/plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>