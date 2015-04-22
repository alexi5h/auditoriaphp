

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
</head>
<body>
<header>
    <h1>Ingresar Usuario</h1>
</header>
<form id="formulario" class='form' >
    <input type="hidden" name="Usuarios[id]" id="id_estudiante">
    <div class="form-group"><label for="nombre" class="required">Nombre</label>
        <input type ="text" name="Usuarios[nombre_usuario]" id="nombre"   maxlength="50"></div>
    <div class="form-group"><label for="contraseña">Contraseña</label>
        <input type ="password" name="Usuarios[password]" id="contraseña"   maxlength="50"></div>
    <div class="form-group"><label for="tipo_usuario" class="required">Tipo Usuario</label>
        <input type ="text" name="Usuarios[tipo_usuario]" id="tipo_usuario"   maxlength="15"></div>


</form>
<button id="btn_ingresar" class="btn btn-success">Ingresar</button>
<button id="btn_nuevo" class="btn btn-info hidden">Nuevo</button>

<script src="../assets/js/jquery-2.1.3.js"></script>
<script src="../assets/plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
<script src="../assets/js/usuario.js"></script>
</body>

</html>