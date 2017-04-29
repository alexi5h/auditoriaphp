<?php

function conectar() {
    $ser = "localhost";
    $us = "root";
    $pass = "";
    $bd = "auditoriaphp";
    $con = new mysqli($ser, $us, $pass, $bd) or die("Connect failed: %s\n". $conn -> error);
//    $con = mysql_connect($ser, $us, $pass) or die("problemas al conectar con servidor");
//    mysql_select_db($bd, $con) or die("problema al conectar con base de datos ");

    return $con;
}

?>