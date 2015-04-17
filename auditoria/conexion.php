<?php
function conectar() {
    $ser = "localhost";
    $us = "root";
    $pass = "";
    $bd = "auditoriaphp";
    $con = mysql_connect($ser, $us, $pass) or die("problemas al conectar con servidor");
    mysql_select_db($bd, $con) or die("problema al conectar con base de datos ");

    return $con;
}
?>