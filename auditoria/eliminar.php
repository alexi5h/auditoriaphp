<?php

require_once 'conexion.php';
$conexion = conectar();
session_start();
$usuario = $_SESSION['usuario'];
if (isset($_POST['Estudiante'])) {
    $id = $_POST['Estudiante']['id'];
    $sql2 = 'delete from tab_estudiantes where idtab_estudiantes=' . $id . '';
    $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_estudiante,delete(' . $id . ')","' . date('H:i:s') . '")';

    $query = mysqli_query($conexion,$sql2);
    $query2 = mysqli_query($conexion,$sql3);
    echo json_encode(array($_POST['Estudiante'], $id));
    
} else if (isset($_POST['Materias'])) {
    $id = $_POST['Materias']['id'];
    $sql2 = 'delete from tab_materias where idtab_materias=' . $id . '';
    $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_materia,delete(' . $id . ')","' . date('H:i:s') . '")';

    $query = mysqli_query($conexion,$sql2);
    $query2 = mysqli_query($conexion,$sql3);
    echo json_encode(array($_POST['Materias'], $id));
    
} else if (isset($_POST['Nota'])) {
    $id = $_POST['Nota']['id'];
    $sql2 = 'delete from tab_notas where idtab_notas=' . $id . '';
    $sql3 = 'insert into tab_auditoria(ip,usuario,trama,tiempo) values("' . ObtenerIP() . '","' . $usuario . '","tab_notas,delete(' . $id . ')","' . date('H:i:s') . '")';

    $query = mysqli_query($conexion,$sql2);
    $query2 = mysqli_query($conexion,$sql3);
    echo json_encode(array($_POST['Nota'], $id));
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
