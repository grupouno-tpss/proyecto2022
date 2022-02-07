<?php

extract($_REQUEST);
require_once('../php/login.php');

$login = new login(
    $_REQUEST['usuario'],
    $_REQUEST['password']
);
header("Location: ../views/options.php");

if (isset($_REQUEST["close"])) {
    $login->cerrarSession();
    header("Location:../views/login.php");
};

if (isset($_REQUEST["ingresar"])) {

    $login->consultarUsuario();
}