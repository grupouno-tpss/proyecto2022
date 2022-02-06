<?php
session_start();
// session_start();
// if (isset($_SESSION["usuario"]) and $_SESSION["contraseña"] and $_SESSION["rol"]) {
//     echo 'Session iniciada';
// } else {
//     echo "No ha iniciado sección";
//     die();
// }
//error_reporting(E_ALL ^ E_NOTICE);
require_once("../php/conexion.php");
require_once("../php/usuarioTrabajador.php");

extract($_REQUEST);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../javascript/noResponsive.js"></script>

    <link rel="stylesheet" href="../css/admint.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script>

    </script>
</head>

<body>
    <?php
    // include "pages/loading.php";
    include "pages/nav.php";
    ?>
    <!-- <nav>
        <h1>SRI</h1>
        <h1>Restaurante Ichiraku Ramen</h1>
        <h2>Usuario: Jhojann Triana</h2>
    </nav> -->
    <div class="content justify-content-around">
        <div class="d-flex">
            <div>Empleados</div>
            <div>Clientes</div>
            <div>Reservaciones</div>
        </div>
    </div>
    <?php
    // $addUsT = new usuarioTrabajador();
    // $addUsT->setPnombre($_REQUEST["Pnombre"]);
    // $addUsT->setSnombre($_REQUEST["Snombre"]);
    // $addUsT->setPapellido($_REQUEST["Papellido"]);
    // $addUsT->setSapellido($_REQUEST["Sapellido"]);
    // $addUsT->setTipodocument($_REQUEST["tipoDocumento"]);
    // $addUsT->setNumdocument($_REQUEST["numDocumento"]);
    // $addUsT->setRol($_REQUEST["rol"]);
    // $addUsT->setEmail($_REQUEST["correo"]);
    // $addUsT->setNumeroTelefonico($_REQUEST["numTelefono"]);
    // $addUsT->setNumeroCelular($_REQUEST["numCelular"]);
    // $addUsT->setContraseña(md5($_REQUEST["contraseña"]));


    // echo $addUsT->getPnombre() . "<br>";
    // echo $addUsT->getSnombre() . "<br>";
    // echo $addUsT->getPapellido() . "<br>";
    // echo $addUsT->getSapellido() . "<br>";
    // echo $addUsT->getTipodocument() . "<br>";
    // echo $addUsT->getNumdocument() . "<br>";
    // echo $addUsT->getRol() . "<br>";
    // echo $addUsT->getEmail() . "<br>";
    // echo $addUsT->getNumeroTelefonico() . "<br>";
    // echo $addUsT->getNumeroCelular() . "<br>";
    // echo $addUsT->getContraseña();
    // echo $addUsT->agregarUsuario() . "<br><br>";


    ?>
    <script src="../javascript/wroker.js"></script>
    <script src="../javascript/postImg.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        window.onload = function() {
            document.getElementById("loading").hidden = true;
        }
    </script>
</body>

</html>