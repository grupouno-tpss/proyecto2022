<?php
extract($_REQUEST);
require_once("../php/admint.php");

$addUsT = new admint(
    $_REQUEST['rol'],
    $_REQUEST['p_nombre'],
    $_REQUEST['s_nombre'],
    $_REQUEST['p_apellido'],
    $_REQUEST['password'],
    $_REQUEST['numeroCelular'],
    $_REQUEST['numeroTelefonico'],
    $_REQUEST['email'],
    $_REQUESTÑ['contraseña'],
);
  
echo $_REQUEST['rol'].
$_REQUEST['p_nombre'].
$_REQUEST['s_nombre'].
$_REQUEST['p_apellido'].
$_REQUEST['password'].
$_REQUEST['numeroCelular'].
$_REQUEST['numeroTelefonico'].
$_REQUEST['email'].
$_REQUESTÑ['contraseña'];

?>
