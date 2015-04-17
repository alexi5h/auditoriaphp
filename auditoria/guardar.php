<?php

require_once 'conexion.php';
$conexion = conectar();
session_start();
$usuario = $_SESSION['usuario'];
if ($_POST['Estudiante']) {
    $id = $_POST['Estudiante']['id'];
    $cedula = $_POST['Estudiante']['cedula'];
    $nombre = $_POST['Estudiante']['nombre'];
    $apellido = $_POST['Estudiante']['apellido'];
    $direccion = $_POST['Estudiante']['direccion'];
    $telefono = $_POST['Estudiante']['telefono'];
    $sql2 = 'insert into tab_estudiantes(cedula,nombre,apellido,direccion,telefono) values("' . $cedula . '","' . $nombre . '","' . $apellido . '","' . $direccion . '","' . $telefono . '")';
    $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","insert,tab_estudiante","00:00")';
}
$query = mysql_query($sql2, $conexion);
$query2 = mysql_query($sql3, $conexion);
echo "agregado correctamente";




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
