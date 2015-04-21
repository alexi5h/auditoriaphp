<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notas</title>
    <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
</head>
<body>
<header>
    <h1>Ingresar Notas</h1>
</header>
<form class='form' >
    <div class="form-group"><label for="id_nota" class="required">Id Nota</label>
        <input type ="text" name="Nota" id="id_nota"  maxlength="10"></div>
    <div class="form-group"><label for="nota" class="required">Nota</label>
        <input type ="text" name="Nota[materia]" id="nota" maxlength="5"></div>
    <div class="form-group"><label class="requiered" for="materia">Materias</label><select>
        <optgroup id="materia">
        <option value="Programacion" >Programacion</option>
        <option value="Administracion de Sistemas">Administracion de Sistemas</option>
        <option value="Automatas">Automatas</option>
    </optgroup></select></div>

</form>

<script src="../assets/js/jquery-2.1.3.js"></script>
<script src="../assets/plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>
</html>