<!DOCTYPE html>
<?php include '../auditoria/bloqueoSeguridad.php'; ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Estudiantes</title>
        <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
    </head>
    <body>
        <header>
            <h1>Gestión Estudiantes</h1>
        </header>
        <form id="formulario" class='form'>
            <input type="hidden" name="Estudiante[id]" id="id_estudiante">
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
                <input name="Estudiante[apellido]" id="apellido" type="text" maxlength="45">
            </div>
            <div class="form-group">
                <label for="direccion" class="required">Dirección</label>
                <input name="Estudiante[direccion]" id="direccion" type="text" maxlength="45">
            </div>
            <div class="form-group">
                <label for="telefono" class="required">Teléfono</label>
                <input name="Estudiante[telefono]" id="telefono" type="text" maxlength="15">
            </div>
        </form>
        <button id="btn_ingresar" class="btn btn-success">Ingresar</button>
        <button id="btn_nuevo" class="btn btn-info hidden">Nuevo</button>
        <br>
        <br>
        <div class="row col-lg-12">
            <table class="table table-bordered" id="tabla" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("../auditoria/conexion.php");
                    $con = conectar();
                    $sql = "select * from tab_estudiantes";
                    $q = mysql_query($sql, $con) or die("problemas al consultar");
                    ?>
                    <?php
                    while ($dato = mysql_fetch_array($q)) {
                        ?>
                        <tr>
                            <td><?php echo $dato['idtab_estudiantes']; ?></td>
                            <td><?php echo $dato['cedula']; ?></td>
                            <td><?php echo $dato['nombre']; ?></td>
                            <td><?php echo $dato['apellido']; ?></td>
                            <td><?php echo $dato['direccion']; ?></td>
                            <td><?php echo $dato['telefono']; ?></td>
                            <td>
                                <input type="button" name ="editar" class ="btn btn-sm btn-primary"  
                                       onclick ="editar('<?php echo $dato['idtab_estudiantes'] ?>', '<?php echo $dato['cedula'] ?>', '<?php echo $dato['nombre'] ?>',
                                                       '<?php echo $dato['apellido'] ?> ', '<?php echo $dato['direccion'] ?>', '<?php echo $dato['telefono'] ?>');" 
                                       value="Editar" style="cursor:pointer"/>
                                <input id="ident<?php echo $dato['idtab_estudiantes'] ?>" class="btn btn-sm btn-danger" type="button"  style="cursor:pointer" value="Eliminar" onclick="eliminar(<?php echo $dato['idtab_estudiantes'] ?>)"/>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <a href="../home.php" class="btn btn-default">Regresar</a>

        <script src="../assets/js/jquery-2.1.3.js"></script>
        <script src="../assets/plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
        <script src="../assets/js/estudiantes.js"></script>
    </body>
</html>