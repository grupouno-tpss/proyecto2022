<?php
session_start();

require_once("../php/conexion.php");
require_once("../php/reserva.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../css/worker.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .content {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            width: 97%;
            color: white;
            margin: auto;
        }

        body {
            background-image: url(https://fondosmil.com/fondo/11825.jpg);
        }

        .section {
            height: 80vh;
        }

        .cards div {
            padding: 50px;
            background-color: #3660BF;
            border-radius: 5px;
            cursor: pointer;
        }

        .cards div:hover {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .cards div a {
            font-size: 25px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include "layouts/nav.php"; ?>
    <!-- <nav>
        <h1>SRI</h1>
        <h1>Restaurante Ichiraku Ramen</h1>
        <h2>Usuario: Juliana Penagos</h2>
    </nav> -->
    <div class="content">
        <div class="section overflow-auto" id="clientes">
            <h2 class="text-center">Clientes</h2>
            <br>
            <table class="table table-dark table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">id usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Telefono Celular</th>
                        <th scope="col">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $empleados = mysqli_query(conectUser(), "SELECT id_usuario, email, p_nombre, p_apellido, telefono, telcelular FROM usuarios U INNER JOIN contactos C ON C.idcontacto = U.contactos_idcontacto WHERE U.roles_usuario_idrol_usuario = 1");

                    while ($row = mysqli_fetch_assoc($empleados)) {
                        echo '<tr>
                                    <th scope="row">' . $row['id_usuario'] . '</th>
                                    <td>' . $row['p_nombre'] . " " . $row['p_apellido'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['telefono'] . '</td>
                                    <td>' . $row['telcelular'] . '</td>
                                    <td>
                                        <button class="btn btn-primary">Modificar<button>
                                        <button class="btn btn-danger">Eliminar<button>
                                    </td>
                                </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
        <br>
        <?php

        $reserva = reserva::consultarReserva();

        ?>

        <div class="container" style="overflow-x: auto;">
            <h2 class="text-center">Reservaciones</h2>
            <br>
            <table class="table table-dark table-bordered">
                <thead>
                    <tr>
                        <th scope="col">id reserva</th>
                        <th scope="col">Titular de la reserva</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Operación</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($row = mysqli_fetch_assoc($reserva)) {
                        echo '<tr>
                        <th scope="row">' . $row['idreserva'] . '</th>
                        <td>' . $row['p_nombre'] . " " . $row['p_apellido'] . '</td>
                        <td>' . $row['fecha'] . '</td>
                        <td>' . $row['hora'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td><button class="btn btn-secondary" onclick="alert(`' . $row['comentariocol'] . '`)">Ver detalle</button></td>
                        <td>' . $row['estado_reserva'] . '</td>
                        <td><!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary">
                                <a href="?m=' . $row['idreserva'] . '" class="link-light">Modificar</a>
                            </button>
                            <button type="button" class="btn btn-danger">
                                <a href="?d=' . $row['idreserva'] . '" class="link-light">Eliminar</a>
                            </button>
                            <button type="button" class="btn btn-secondary">
                                <a href="?d=' . $row['idreserva'] . '" class="link-light">Archivar</a>
                            </button>
                         </td>
                    </tr>';
                    }
                    ?>
                </tbody>
        </div>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="javascript/wroker.js"></script>
    <script src="javascript/postImg.js"></script>

</body>

</html>