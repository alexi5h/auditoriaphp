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
        <form id="formulario" class='form' >
            <input type="hidden" name="Nota[id]" id="id_nota">
            <div class="form-group">
                <label for="estudiantes" class="required">Estudiante</label>
                <select id="estudiantes" name="Nota[estudiantes]">
                    <?php
                    require_once("../auditoria/conexion.php");
                    $con = conectar();
                    $sql = "select * from tab_estudiantes";
                    $q = mysql_query($sql, $con) or die("problemas al consultar");
                    ?>
                    <?php
                    while ($dato = mysql_fetch_array($q)) {
                        ?>
                        <option value="<?php echo $dato['idtab_estudiantes']; ?>"><?php echo $dato['nombre'] . ' ' . $dato['apellido']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="materias" class="required">Materia</label>
                <select id="materias" name="Nota[materias]">
                    <?php
                    $sql2 = "select * from tab_materias";
                    $q2 = mysql_query($sql2, $con) or die("problemas al consultar");
                    ?>
                    <?php
                    while ($dato2 = mysql_fetch_array($q2)) {
                        ?>
                        <option value="<?php echo $dato2['idtab_materias']; ?>"><?php echo $dato2['materia']; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="nota" class="required">Nota</label>
                <input type ="text" name="Nota[nota]" id="nota" maxlength="5">
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
                        <th>Estudiante</th>
                        <th>Materia</th>
                        <th>Nota</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql3 = 'select n.idtab_notas as id, es.idtab_estudiantes as id_est, concat(es.nombre,concat(" ",es.apellido)) as estudiante, mat.idtab_materias as id_mat, mat.materia,n.nota
                            from tab_notas n
                            inner join tab_estudiantes es on es.idtab_estudiantes = n.tab_estudiantes_idtab_estudiantes
                            inner join tab_materias mat on mat.idtab_materias = n.tab_materias_idtab_materias';
                    $q3 = mysql_query($sql3, $con) or die("problemas al consultar");
                    ?>
                    <?php
                    while ($dato3 = mysql_fetch_array($q3)) {
                        ?>
                        <tr>
                            <td><?php echo $dato3['id']; ?></td>
                            <td><?php echo $dato3['estudiante']; ?></td>
                            <td><?php echo $dato3['materia']; ?></td>
                            <td><?php echo $dato3['nota']; ?></td>
                            <td>
                                <input type="button" name ="editar" class ="btn btn-sm btn-primary"  
                                       onclick ="editar('<?php echo $dato3['id'] ?>', '<?php echo $dato3['id_est'] ?>', '<?php echo $dato3['id_mat'] ?>',
                                                           '<?php echo $dato3['nota'] ?>');" 
                                       value="Editar" style="cursor:pointer"/>
                                <input id="ident<?php echo $dato3['id'] ?>" class="btn btn-sm btn-danger" type="button"  style="cursor:pointer" value="Eliminar" onclick="eliminar(<?php echo $dato3['id'] ?>)"/>
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
                    </tr>
                </tfoot>
            </table>
        </div>

        <a href="../home.php" class="btn btn-default">Regresar</a>

        <script src="../assets/js/jquery-2.1.3.js"></script>
        <script src="../assets/plugins/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
        <script src="../assets/js/notas.js"></script>
    </body>
</html>