<?php

include ('funciones.php');
$usuario = $_POST['Login']['username'];
$clave = $_POST['Login']['password'];
if (conexiones($usuario, $clave)) {
    header('Location: ../home.php');
} else {
    header('Location: ../index.php');
}
?>