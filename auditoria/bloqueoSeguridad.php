<?php

//Inicio la sesión
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if (!$_SESSION["usuario"]) {
//si no existe, va a la página de autenticacion
    header("Location: ../index.php");
//salimos de este script
    exit();
}