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

$trama = $cedula.','.$nombre.','.$apellido.','.$direccion.','.$telefono;
    if ($id) {
        $sql2 = 'update tab_estudiantes set cedula="' . $cedula . '",nombre="' . $nombre . '",apellido="' . $apellido . '",direccion="' . $direccion . '",telefono="' . $telefono . '" where idtab_estudiantes="' . $id . '"';
        $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_estudiante,update('.$trama.')","'.date('H:i:s').'")';
    } else {
        $sql2 = 'insert into tab_estudiantes(cedula,nombre,apellido,direccion,telefono) values("' . $cedula . '","' . $nombre . '","' . $apellido . '","' . $direccion . '","' . $telefono . '")';
        $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_estudiante,insert('.$trama.')","'.date('H:i:s').'")';
    }
    $query = mysql_query($sql2, $conexion);
    $id_new = mysql_insert_id();
    $query2 = mysql_query($sql3, $conexion);
    echo json_encode(array($_POST['Estudiante'], $id_new));
}
else if (isset($_POST['Materias'])) {
    $id = $_POST['Materias']['id'];
    $materia = $_POST['Materias']['materia'];

    if ($id) {
        $sql2 = 'update tab_materias set materia="' . $materia .  '" where idtab_materias="' . $id . '"';
        $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_materias,update('.$materia.')","'.date('H:i:s').'")';
    } else {
        $sql2 = 'insert into tab_materias(materia) values("' .$materia .'")';
        $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_materias,insert('.$materia.')","'.date('H:i:s').'")';
    }
    $query = mysql_query($sql2, $conexion);
    $id_new = mysql_insert_id();
    $query2 = mysql_query($sql3, $conexion);
    echo json_encode(array($_POST['Materias'], $id_new));
}

else if (isset($_POST['Usuarios'])) {
    $id = $_POST['Usuarios']['id'];
    $nombr_usuario = $_POST['Usuarios']['nombre_usuario'];
    $password =$_POST['Usuarios']['password'];
    $tipo_usuario=$_POST['Usuarios']['tipo_usuario'];
    $cadena = $nombr_usuario .','.$password .','.$tipo_usuario;
    var_dump($_POST['Usuarios']);
    die();
    if ($id) {
        $sql2 = 'update tab_usuarios set nombre_usuario="' .$nombr_usuario . '",password ="'.$password.'" ,tipo_usuario="'.$tipo_usuario.'" where idtab_materias="' . $id . '"';
        $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_materias,update('.$cadena.')","'.date('H:i:s').'")';
    } else {
        $sql2 = 'insert into tab_usuarios(nombre_usuario,password,tipo_usuario) values("' .$nombr_usuario .'","'.$password.'","'.$tipo_usuario.'" )';
        $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_materias,insert('.$cadena.')","'.date('H:i:s').'")';
    }
    $query = mysql_query($sql2, $conexion);
    $id_new = mysql_insert_id();
    $query2 = mysql_query($sql3, $conexion);
    echo json_encode(array($_POST['Usuarios'], $id_new));
}

else if (isset($_POST['Nota'])) {
    $id = $_POST['Nota']['id'];
    $nota_materia =$_POST['Nota']['nota_materia'];
    $materia=$_POST['Nota']['materia'];
    $cadena = $nota .','.$nota_materia .','.$materia;
    var_dump($_POST['Usuarios']);
    die();
    if ($id) {
        $sql2 = 'update tab_notas set tab_estudiantes_idtab_estudiantes ="'.$nota_materia.'" ,tab_materias_idtab_materias="'.$tipo_usuario.'" where idtab_materias="' . $id . '"';
        $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_materias,update('.$cadena.')","'.date('H:i:s').'")';
    } else {
        $sql2 = 'insert into tab_notas(nombre_usuario,password,tipo_usuario) values("' .$nombr_usuario .'","'.$password.'","'.$tipo_usuario.'" )';
        $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_materias,insert('.$cadena.')","'.date('H:i:s').'")';
    }
    $query = mysql_query($sql2, $conexion);
    $id_new = mysql_insert_id();
    $query2 = mysql_query($sql3, $conexion);
    echo json_encode(array($_POST['Usuarios'], $id_new));
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
