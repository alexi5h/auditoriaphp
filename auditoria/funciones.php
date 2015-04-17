<?php

function conexiones($usuario, $clave) {
    $conectar = mysql_connect('localhost', 'root', '');
    mysql_select_db('auditoriaphp', $conectar);
    $sql = "SELECT * FROM `auditoriaphp`.`tab_usuarios` WHERE `nombre_usuario`='$usuario' AND `password`='$clave'";
    $ejecutar_sql = mysql_query($sql, $conectar);
//        var_dump($ejecutar_sql);
//        die();
    if (mysql_num_rows($ejecutar_sql) != 0) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        return true;
    } else {
        return false;
    }
}

function verificar_usuario() {
    session_start();
    if ($_SESSION[usuario]) {
        return true;
    }
}

function cerrar_sesion() {
    session_start();
    session_destroy();
}

function insert($tipo, $data) {
    switch ($tipo) {
        case 'estudiante' :
            mysql_connect("localhost", "root", "");
            mysql_selectdb("auditoriaphp");
            mysql_query('insert into tab_estudiantes values (' . $data["id"] . ',"'.$data["cedula"].'","' . $data["nombre"] . '","' . $data["apellido"] . '","' . $data["direccion"] . '","' . $data["telefono"] . '")');
            return true;
        case 'materia' :
            var_dump('no');
            die();
            return true;
    }
    return false;
}

?>