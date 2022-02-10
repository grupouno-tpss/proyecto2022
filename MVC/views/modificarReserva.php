<?php
require_once("../php/conexion.php");
extract($_REQUEST);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .center {
            display: flex;
            justify-content: center;
        }

        .estado {
            color: red;
            font-weight: bold;
        }

        td,
        th {
            border: solid 1px black;
            text-align: center;
        }

        .tab {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <div class="container">

        <?php
        //include "pages/loading.php";
        include "layouts/nav.php";

        echo "<h3>ACTUALIZAR DATOS DE RESERVACIÓN: " . $_REQUEST["modificarCR"] . "</h3><br>";

        $resultado = mysqli_query(conectUser(), "SELECT idreserva, cantpersonas, hora, fecha, comentariocol, idcomentario, estado, tipo_documento, numDocumento, correo, telefono, telcelular, p_nombre FROM reserva R INNER JOIN info_reserva I ON R.info_reserva_idinfo = I.idinfo INNER JOIN especificacion E ON E.idcomentario = R.especificacion_idcomentario INNER JOIN estado ES ON ES.idestado = R.estado_idestado INNER JOIN usuario U ON R.usuario_numDocumento = U.numDocumento AND R.usuario_numDocumento = " . $_SESSION["numDocumento"] . " AND R.idreserva = " . $_REQUEST["modificarCR"] . " INNER JOIN contacto C ON C.idcontacto = U.contacto_idcontacto;");
        $resultadoHora = mysqli_query(conectUser(), "SELECT * FROM info_reserva");
        $resultadoFecha = mysqli_query(conectUser(), "SELECT * FROM info_reserva");

        while ($row = mysqli_fetch_assoc($resultado)) {
            echo '
            <form action="../php/reserva.php?reservaid='. $_REQUEST["modificarCR"] .'" method="post">
        <div class="mb-3">
            <label for="cantpersonas" class="form-label">Cantidad personas</label>
            <input type="number" value="'.$row["cantpersonas"].'" min="1" class="form-control" placeholder="' . $row["cantpersonas"] . '" name="cantpersonas" aria-describedby="emailHelp">
        </div>
        <br>
        <select class="form-select" name="hora" aria-label="Default select example">
        <option selected>Horas disponibles</option>
        ';

            while ($rowHora = mysqli_fetch_assoc($resultadoHora)) {
                echo '
                <option value="'.$rowHora["idinfo"].'">' . $rowHora["hora"] . '</option>";
            ';
            }

            echo '
        </select>
        <br>
        <select class="form-select" name="fecha" aria-label="Default select example">
            <option selected>Open this select menu</option>
            ';

            while ($rowFecha = mysqli_fetch_assoc($resultadoFecha)) {
                echo $rowFecha["fecha"];
                echo '
                    <option value="'.$rowFecha["idinfo"].'">' . $rowFecha["fecha"] . '</option>";
                ';
            };


            echo '</select>
        <div class="mb-3">
            <label for="indicaciones" class="form-label">Indicaciones</label>
            <input type="text" value="'.$row["comentariocol"].'" class="form-control" placeholder="' . $row["comentariocol"] . '" name="indicaciones" aria-describedby="emailHelp">
        </div>
        <input type="submit" name="actualizarD" class="btn btn-primary" value="Actualizar datos">
        </form>
        <br>
        <button class="btn btn-secondary"><a href="reservaciones.php">Atras</a></button>

        ';
        }

        ?>
    </div>
</body>

</html>