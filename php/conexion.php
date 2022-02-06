<?php 

    $user = "localhost";
    $host = "root";
    $password = "";
    $database = "proyecto";

    function conectReserva () {
        $conexion = mysqli_connect("localhost", "root", "", "proyecto");
        return $conexion;
    }
    function conectUser () {
        $conexion = mysqli_connect("localhost", "root", "", "mydb");
        return $conexion;
    }
?>