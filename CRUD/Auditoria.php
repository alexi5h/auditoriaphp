<!DOCTYPE html>
<?php include '../auditoria/bloqueoSeguridad.php'; ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Auditoría</title>
        <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css" />
    </head>
    <body>
        <header>
            <h1>Detalle de transacciones</h1>
        </header>
        <div class="row col-lg-12">
            <table class="table table-bordered" id="tabla" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>IP</th>
                        <th>Usuario</th>
                        <th>Trama</th>
                        <th>Tiempo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once("../auditoria/conexion.php");
                    $con = conectar();
                    $sql = "select * from tab_auditoria";
                    $q = mysql_query($sql, $con) or die("problemas al consultar");
                    ?>
                    <?php
                    while ($dato = mysql_fetch_array($q)) {
                        ?>
                        <tr>
                            <td><?php echo $dato['idtab_auditoria']; ?></td>
                            <td><?php echo $dato['ip']; ?></td>
                            <td><?php echo $dato['usuario']; ?></td>
                            <td><?php echo $dato['trama']; ?></td>
                            <td><?php echo $dato['tiempo']; ?></td>
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
    </body>
</html>