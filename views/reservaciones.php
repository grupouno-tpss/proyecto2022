<?php
session_start();
echo "HOla";
echo "<script>alert('".$_SESSION['user']."')</script>";

require_once("../php/conexion.php");
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
    include "pages/loading.php";
    include "pages/nav.php";

    $resultado = mysqli_query(conectUser(), "SELECT idreserva, cantpersonas, hora, fecha, comentariocol, idcomentario, estado, tipo_documento, numDocumento, correo, telefono, telcelular, p_nombre FROM reserva R INNER JOIN info_reserva I ON R.info_reserva_idinfo = I.idinfo INNER JOIN especificacion E ON E.idcomentario = R.especificacion_idcomentario INNER JOIN estado ES ON ES.idestado = R.estado_idestado INNER JOIN usuario U ON R.usuario_numDocumento = U.numDocumento AND R.usuario_numDocumento = " . $_SESSION["numDocumento"] . " INNER JOIN contacto C ON C.idcontacto = U.contacto_idcontacto;");

    echo '<section class="container tab">
    <br><br><h3>RESERVACIONES USUARIO: ' . $_SESSION["usuario"] . '</h3> <br><br>   
    <table class="table">
        <thead><tr>
        <th scope="col">ID RESERVA</th>
        <th scope="col">CANTIDAD PERSONAS</th>
        <th scope="col">HORA</th>
        <th scope="col">FECHA</th>
        <th scope="col">INDICACIONES</th>
        <th scope="col">ESTADO</th>
        <th scope="col">TIPO DE DOCUMENTO</th>        
        <th scope="col">NUMERO DE DOCUMENTO</th>        
        <th scope="col">CORREO</th>        
        <th scope="col">TELEFONO</th>        
        <th scope="col">TELEFONO CELULAR</th>  
        <th scope="col">OPERACIÓN</th>        
      </tr>
    </thead><tbody>';
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo '<tr>
        <th scope="row">' . $row["idreserva"] . '</th>
        <td>' . $row["cantpersonas"] . '</td>
        <td>' . $row["hora"] . '</td>
        <td>' . $row["fecha"] . '</td>
        <td>' . $row["comentariocol"] . '</td>
        <td class="estado">' . $row["estado"] . '</td>
        <td>' . $row["tipo_documento"] . '</td>
        <td>' . $row["numDocumento"] . '</td>
        <td>' . $row["correo"] . '</td>
        <td>' . $row["telefono"] . '</td>
        <td>' . $row["telcelular"] . '</td>
        <td><button onclick="eliminarReservaUsuario(' . $row["idreserva"] . ')" class="btn btn-danger">Cancelar reservación</button></td>
        <td><button class="btn btn-primary"><a href="../views/modificarReserva.php?modificarCR=' . $row["idreserva"] . '" style="color: white">Modificar reservación<a></button></td>
      </tr>';
    }

    echo '</tbody>
        </table></section>';
    ?>

    <br>

    <div class="center">
        <button class="btn btn-primary"><a href="reserva.php" style="color: white; font-weight: bold;">Hacer una reserva</a></button>
    </div>

    <script>
        function eliminarReservaUsuario(idreserva) {
            var deleteComfirmRU = confirm("Seguro que quiere eliminar la reservación?");

            if (deleteComfirmRU = true) {
                location.href = "../php/reserva.php?idReservaD=" + idreserva;
            }
        }

        function modificarReserva(idreservaM) {
            location.href = "../views/modificarReserva.php?idReservaD=" + idreservaM;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        window.onload = function() {
            document.getElementById("loading").hidden = true;
        }
    </script>
</body>

</html>