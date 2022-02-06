<?php
$reserva = new reserva();

if (isset($_REQUEST["sendR"])) {
    $reserva->setHora($_REQUEST["hora"]);
    $reserva->setFecha($_REQUEST["fecha"]);
    $reserva->setPersonas($_REQUEST["cantPersonas"]);
    $reserva->setPaquete($_REQUEST["tipoServicio"]);
    $reserva->setIndicacion($_REQUEST["especificacion"]);
    $reserva->setMenu($_REQUEST["menu"]);

    echo "Hora: " . $reserva->getHora() . "<br>";
    echo "Fecha: " . $reserva->getFecha() . "<br>";
    echo "Cantidad de personas: " . $reserva->getPersonas() . "<br>";
    echo "Paquete: " . $reserva->getPaquete() . "<br>";
    echo "Indicaciones: " . $reserva->getIndicacion() . "<br>";
    echo "Menú: " . $reserva->getMenu() . "<br>";

    $reserva->generarID();
    echo $reserva->getID() . "<br>";
    echo $reserva->getID() . "<br>";


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
    $reserva->setHora($_REQUEST["hora"]);
    $reserva->setFecha($_REQUEST["fecha"]);
    $reserva->setPersonas($_REQUEST["cantpersonas"]);
    $reserva->setIndicacion($_REQUEST["indicaciones"]);
    $reserva->actualizarReserva();
    header("Location:../views/reservaciones.php");
}
