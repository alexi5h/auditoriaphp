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
            <h1>Gestión Materias</h1>
        </header>
        <form id="formulario" class='form' >
            <input type="hidden" name="Materias[id]" id="id_materia">
            <div class="form-group"><label for="materia_nombre" class="required">Nombre Materia</label>
                <input name="Materias[materia]" id="materia_nombre" type ="text"  maxlength="50"></div>
        </form>
        <button id="btn_ingresar" class="btn btn-success">Ingresar</button>
        <button id="btn_nuevo" class="btn btn-info hidden">Nuevo</button>
        <br>
        <br>
        <div class="row col-lg-12">
            <table class="table table-bordered" id="tabla" width="100%">
                <thead>
                    <tr>
                        <th>Id_materia</th>
                        <th>Materia</th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                    require_once("../auditoria/conexion.php");
                    $con = conectar();
                    $sql = "select * from tab_materias";
                    $q = mysqli_query($con,$sql) or die("problemas al consultar");
                    ?>
                    <?php
                    while ($dato = mysqli_fetch_array($q)) {
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $dato['idtab_materias']; ?></td>
                            <td><?php echo $dato['materia']; ?></td>
                            <td>
                                <input type="button" name ="editar" class ="btn btn-sm btn-primary"
                                       onclick ="editar('<?php echo $dato['idtab_materias'] ?>', '<?php echo $dato['materia'] ?>');"
                                       value="Editar" style="cursor:pointer"/>
                                <input id="ident<?php echo $dato['idtab_materias'] ?>" class="btn btn-sm btn-danger" type="button"  style="cursor:pointer" value="Eliminar"
                                       onclick="eliminar(<?php echo $dato['idtab_materias'] ?>)"/>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <a href="../home.php" class="btn btn-default">Regresar</a>



        <script src="../assets/js/jquery-2.1.3.js"></script>
        <script src="../assets/plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
        <script src="../assets/js/materias.js"></script>
    </body>
</html>