<?php


require_once('../php/reserva.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            height: 80vh;
        }
    </style>
</head>

<body>
    <?php
    include "pages/nav.php";

    $reserva = reserva::consultarReserva();

    ?>
    <div class="container" style="overflow-x: auto;">
        <h2 class="text-center">Reservaciones</h2>
        <br>
        <table class="table table-bordered">
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
                        <td>'.$row['p_nombre']. " " . $row['p_apellido'].'</td>
                        <td>'. $row['fecha'].'</td>
                        <td>'. $row['hora'].'</td>
                        <td>'. $row['email'].'</td>
                        <td><button class="btn btn-secondary" onclick="alert(`'.$row['comentariocol'].'`)">Ver detalle</button></td>
                        <td>'. $row['estado'].'</td>
                        <td><button class="btn btn-primary">Modificar</button> <button class="btn btn-danger">Eliminar</button></td>
                    </tr>';
                }
                ?>
            </tbody>
    </div>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        window.onload = function() {
            document.getElementById("loading").hidden = true;
        }
    </script>
</body>

</html>
