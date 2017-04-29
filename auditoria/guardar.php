<?php

require_once 'conexion.php';
$conexion = conectar();
session_start();
$usuario = $_SESSION['usuario'];
if (isset($_POST['Estudiante'])) {
    $id = $_POST['Estudiante']['id'];
    $cedula = $_POST['Estudiante']['cedula'];
    $nombre = $_POST['Estudiante']['nombre'];
    $apellido = $_POST['Estudiante']['apellido'];
    $direccion = $_POST['Estudiante']['direccion'];
    $telefono = $_POST['Estudiante']['telefono'];
    if ($cedula && $nombre && $apellido) {
        $trama = $cedula . ',' . $nombre . ',' . $apellido . ',' . $direccion . ',' . $telefono;
        if ($id) {
            $sql2 = 'update tab_estudiantes set cedula="' . $cedula . '",nombre="' . $nombre . '",apellido="' . $apellido . '",direccion="' . $direccion . '",telefono="' . $telefono . '" where idtab_estudiantes="' . $id . '"';
            $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_estudiante,update(' . $trama . ')","' . date('H:i:s') . '")';
        } else {
            $sql2 = 'insert into tab_estudiantes(cedula,nombre,apellido,direccion,telefono) values("' . $cedula . '","' . $nombre . '","' . $apellido . '","' . $direccion . '","' . $telefono . '")';
            $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_estudiante,insert(' . $trama . ')","' . date('H:i:s') . '")';
        }
        $query = mysqli_query($conexion, $sql2);
        $id_new = mysqli_insert_id($conexion);
        $query2 = mysqli_query($conexion, $sql3);
        echo json_encode(array($_POST['Estudiante'], $id_new));
    } else {
        echo json_encode(array());
    }
} else if (isset($_POST['Materias'])) {
    $id = $_POST['Materias']['id'];
    $materia = $_POST['Materias']['materia'];
    if ($materia) {
        if ($id) {
            $sql2 = 'update tab_materias set materia="' . $materia . '" where idtab_materias="' . $id . '"';
            $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_materias,update(' . $materia . ')","' . date('H:i:s') . '")';
        } else {
            $sql2 = 'insert into tab_materias(materia) values("' . $materia . '")';
            $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_materias,insert(' . $materia . ')","' . date('H:i:s') . '")';
        }
        $query = mysqli_query($conexion, $sql2);
        $id_new = mysqli_insert_id($conexion);
        $query2 = mysqli_query($conexion, $sql3);
        echo json_encode(array($_POST['Materias'], $id_new));
    } else {
        echo json_encode(array());
    }
} else if (isset($_POST['Usuarios'])) {
    $id = $_POST['Usuarios']['id'];
    $nombr_usuario = $_POST['Usuarios']['nombre_usuario'];
    $password = $_POST['Usuarios']['password'];
    $tipo_usuario = $_POST['Usuarios']['tipo_usuario'];
    if ($nombr_usuario && $password) {
        $cadena = $nombr_usuario . ',' . $password . ',' . $tipo_usuario;
        if ($id) {
            $sql2 = 'update tab_usuarios set nombre_usuario="' . $nombr_usuario . '",password ="' . $password . '" ,tipo_usuario="' . $tipo_usuario . '" where idtab_usuarios="' . $id . '"';
            $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_usuarios,update(' . $cadena . ')","' . date('H:i:s') . '")';
        } else {
            $sql2 = 'insert into tab_usuarios(nombre_usuario,password,tipo_usuario) values("' . $nombr_usuario . '","' . $password . '","' . $tipo_usuario . '" )';
            $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_usuarios,insert(' . $cadena . ')","' . date('H:i:s') . '")';
        }
        $query = mysqli_query($conexion, $sql2);
        $id_new = mysqli_insert_id($conexion);
        $query2 = mysqli_query($conexion, $sql3);
        echo json_encode(array($_POST['Usuarios'], $id_new));
    } else {
        echo json_encode(array());
    }
} else if (isset($_POST['Nota'])) {
    $id = $_POST['Nota']['id'];
    $estudiante = $_POST['Nota']['estudiantes'];
    $materia = $_POST['Nota']['materias'];
    $nota = $_POST['Nota']['nota'];
    if ($estudiante && $materia && $nota) {
        $cadena = $estudiante . ',' . $materia . ',' . $nota;
        if ($id) {
            $sql2 = 'update tab_notas set tab_estudiantes_idtab_estudiantes ="' . $estudiante . '" ,tab_materias_idtab_materias="' . $materia . '", nota="' . $nota . '" where idtab_notas="' . $id . '"';
            $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_notas,update(' . $cadena . ')","' . date('H:i:s') . '")';
        } else {
            $sql2 = 'insert into tab_notas(tab_estudiantes_idtab_estudiantes,tab_materias_idtab_materias,nota) values("' . $estudiante . '","' . $materia . '","' . $nota . '" )';
            $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_notas,insert(' . $cadena . ')","' . date('H:i:s') . '")';
        }

        $query = mysqli_query($conexion, $sql2);
        $id_new = mysqli_insert_id($conexion);
        $query2 = mysqli_query($conexion, $sql3);

        //cambiar ids por nombres para mostrar en tabla
        $sqlConsulta = 'select concat(es.nombre,concat(" ",es.apellido)) as estudiante from tab_estudiantes es where es.idtab_estudiantes=' . $_POST['Nota']['estudiantes'];
        $query3 = mysqli_query($conexion, $sqlConsulta);
        while ($dato = mysqli_fetch_array($query3)) {
            $_POST['Nota']['estudiantes'] = $dato['estudiante'];
        }
        $sqlConsulta = 'select materia from tab_materias where idtab_materias=' . $_POST['Nota']['materias'];
        $query3 = mysqli_query($conexion, $sqlConsulta);
        while ($dato2 = mysqli_fetch_array($query3)) {
            $_POST['Nota']['materias'] = $dato2['materia'];
        }

        echo json_encode(array($_POST['Nota'], $id_new));
    } else {
        echo json_encode(array());
    }
}

function getRealIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];

    return $_SERVER['REMOTE_ADDR'];
}

function ObtenerIP() {
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
        $ip = getenv("REMOTE_ADDR");
    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
        $ip = $_SERVER['REMOTE_ADDR'];
    else
        $ip = "IP desconocida";
    return($ip);
}
