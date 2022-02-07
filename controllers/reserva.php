<?php
session_start();
extract($_REQUEST);
require_once('../php/reserva.php');
echo $userid = $_SESSION['userID'];
$reserva = new reserva(
    $userid,
    $_REQUEST['fecha'],
    $_REQUEST['hora'],
    $_REQUEST['menu'],
    $_REQUEST['cantPersonas'],
    $_REQUEST['tipoServicio'],
    $_REQUEST['especificacion'],
    "true"
);

if (isset($_REQUEST["sendR"])) {

    echo "Hora: " . $reserva->getHora() . "<br>";
    echo "Fecha: " . $reserva->getFecha() . "<br>";
    echo "Cantidad de personas: " . $reserva->getPersonas() . "<br>";
    echo "Paquete: " . $reserva->getPaquete() . "<br>";
    echo "Indicaciones: " . $reserva->getIndicacion() . "<br>";
    echo "Menú: " . $reserva->getMenu() . "<br>";

    $reserva->reservar();
    header("Location:../views/reservaciones.php");
}

if (isset($_REQUEST["idReservaD"])) {
    echo $_REQUEST["idReservaD"];
    mysqli_query(conectUser(), "DELETE FROM reserva WHERE idreserva = " . $_REQUEST["idReservaD"] . "");
    mysqli_query(conectUser(), "DELETE FROM especificacion WHERE idcomentario = " . $_REQUEST["idReservaD"] . "");
    header("Location:../views/reservaciones.php");
}

if (isset($_REQUEST["actualizarD"])) {
    // echo $_REQUEST["cantpersonas"];
    // echo $_REQUEST["hora"];
    // echo $_REQUEST["fecha"];
    // echo $_REQUEST["indicaciones"];
}
