<?php
extract($_REQUEST);
require_once('../php/usuarioCliente.php');
if (isset($_REQUEST["registrar"])) {
    $usuarioCliente = new usuarioCliente(
        "CLIENTE",
        $_REQUEST['p_nombre'],
        $_REQUEST['s_nombre'],
        $_REQUEST['p_apellido'],
        $_REQUEST['s_apellido'],
        $_REQUEST['telcelular'],
        $_REQUEST['telefono'],
        $_REQUEST['email'],
        $_REQUEST['direccion'],
        $_REQUEST['contraseña'],
    );

    $usuarioCliente->agregarusuarioCliente();

    echo $usuarioCliente->getPnombre() . "<br>";
    echo $usuarioCliente->getSnombre() . "<br>";
    echo $usuarioCliente->getPapellido() . "<br>";
    echo $usuarioCliente->getSapellido() . "<br>";
    echo $usuarioCliente->getEmail() . "<br>";
    echo $usuarioCliente->getContraseña() . "<br>";
    echo $usuarioCliente->getNumeroTelefonico() . "<br>";
    echo $usuarioCliente->getNumeroCelular() . "<br>";
    echo "<script>alert('Ha sido registrado ¡Bienvenid@!');</script>";
    header("Location:../views/login.php");
}
