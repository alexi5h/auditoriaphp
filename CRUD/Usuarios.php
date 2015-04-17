

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
    <h1>Ingresar Usuario</h1>
</header>
<form class='form' >
    <div class="form-group" ><label for="id_usuario" class="required">Id Usuario</label>
        <input type ="text" name="Usuario[id]"  id="id_usuario" maxlength="10"></div>
    <div class="form-group"><label for="nombre" class="required">Nombre</label>
        <input type ="text" name="Usuario[nombre]" id="nombre"   maxlength="50"></div>
    <div class="form-group"><label for="contraseña">Contrase&#241;a</label>
        <input type ="password" name="Usuario[password]" id="contraseña"   maxlength="50"></div>
    <div class="form-group"><label for="tipo_usuario" class="required">Tipo Usuario</label>
        <input type ="text" name="tipo_usuario" id="tipo_usuario"   maxlength="15"></div>
    <div><input type="submit" class="btn btn-success"></div>
    <div><input type="reset" class="btn btn-danger"></div>

</form>
<script src="../assets/js/jquery-2.1.3.js"></script>
<script src="../assets/plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
</body>

</html>