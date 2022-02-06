<?php

extract($_REQUEST);
require_once('../php/login.php');

echo $_REQUEST['usuario'].
$_REQUEST['password'];
$login = new login(
    $_REQUEST['usuario'],
    $_REQUEST['password']
);

if (isset($_REQUEST["close"])) {
    $login->cerrarSession();
    header("Location:../views/login.php");
};

if (isset($_REQUEST["ingresar"])) {

    $login->consultarUsuario();
}
