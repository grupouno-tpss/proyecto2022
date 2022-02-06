<?php
session_start();
if (isset($_SESSION["usuario"]) and $_SESSION["contraseña"] and $_SESSION["rol"]) {
} else {
    echo "No ha iniciado sección";
    die();
}
require_once("../php/conexion.php");
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
        * {
            margin: 0px;
            font-family: cursive;
        }

        body {
            background-image: url(https://fondosmil.com/fondo/11825.jpg);
        }

        nav {
            display: flex;
            justify-content: space-between;
            color: white;
            text-align: center;
            padding-right: 70px;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
        }

        table {
            color: white;
            background: rgba(0, 0, 0, 0.4);
            margin: auto;
            width: 100%;
        }

        a {
            color: rgb(103, 156, 224);
            font-weight: 800;
        }

        input {
            border: solid black 1px;
            padding: 10px;
            border-radius: 5px;
            background: rgba(0, 0, 0, 0.5);
            width: 80%;
            height: 100px;
            color: white;
        }

        td,
        th {
            border: solid black 1px;
            padding: 10px;
        }

        th {
            background: rgba(0, 0, 0, 0.5);
            font-weight: 800;
            text-align: center;
        }

        .tab {
            height: 80vh;
            overflow-x: auto;
            overflow-y: auto;
        }

        .content {
            color: white;
            background: rgba(0, 0, 0, 0.2);
            margin: 30px;
        }

        .submit {
            width: 150px;
            height: 50px;
        }

        .submit:hover {
            background: rgba(0, 0, 0, 0.20);
        }

        #det {
            color: black;
        }
    </style>
</head>

<body>
    <?php include "pages/nav.php"; ?>
    <!-- <nav>
        <h1>SRI</h1>
        <h1>Restaurante Ichiraku Ramen</h1>
        <h2>Usuario: Juliana Penagos</h2>
    </nav> -->
    <div class="content">
        <a href="#" onclick='req("multimedia/req-recep.png")'>RF</a>

        <a href="admint.html">Vista de administrador</a>


        <div class="container">
            <h1>Clientes registrados</h1>
            <hr><br>
            <?php
            $resultado = mysqli_query(conectUser(), "SELECT tipo_documento, numDocumento,  p_nombre, s_nombre, p_apellido, s_apellido, rol, correo, telefono, telcelular FROM usuario U INNER JOIN rol_usuario R ON U.rol_usuario_idrol_usuario = R.idrol_usuario AND R.idrol_usuario = 3 INNER JOIN contacto C ON U.numDocumento = C.idcontacto;");
            echo '<div class="container" id="users"><table class="table table-dark table-hover">
             <thead>
               <tr>
                 <th scope="col">Rol</th>
                 <th scope="col">Tipo documento</th>
                 <th scope="col">Numero de documento</th>
                 <th scope="col">Nombres y apellidos</th>
                 <th scope="col">Correo</th>
                 <th scope="col">Telefono</th>
                 <th scope="col">Telefono Celular</th>
                 <th scope="col">Eliminar</th>

               </tr>
             </thead>
             <tbody>';
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo '
                   <tr>
                     <td>' . $row["rol"] . '</td>
                     <td>' . $row["tipo_documento"] . '</td>
                     <td>' . $row["numDocumento"] . '</td>
                     <td>' . $row["p_nombre"] . " " . $row["s_nombre"] . " " . $row["p_apellido"] . " " . $row["s_apellido"] . '</td>
                     <td>' . $row["correo"] . '</td>
                     <td>' . $row["telefono"] . '</td>
                     <td>' . $row["telcelular"] . '</td>
                     <td><button class="btn btn-danger"><a href="../php/admint.php?numero=' . $row["numDocumento"] . '&tipo=' . $row["tipo_documento"] . '">Eliminar</a></button></td>
                   </tr>';
            }
            echo '</tbody>
             </table></div>';
            ?>

            <h1>Detalles de reservaciones</h1>
            <hr><br>
            <div class="container">

                <?php
                $resultado = mysqli_query(conectUser(), "SELECT idreserva, cantpersonas, hora, fecha, comentariocol, idcomentario, estado, tipo_documento, numDocumento, correo, telefono, telcelular, p_nombre FROM reserva R INNER JOIN info_reserva I ON R.info_reserva_idinfo = I.idinfo INNER JOIN especificacion E ON E.idcomentario = R.especificacion_idcomentario INNER JOIN estado ES ON ES.idestado = R.estado_idestado INNER JOIN usuario U ON R.usuario_numDocumento = U.numDocumento AND R.usuario_numDocumento = U.numDocumento INNER JOIN contacto C ON C.idcontacto = U.contacto_idcontacto;");

                echo '<section class="container tab">
                <br><br><h3>RESERVACIONES USUARIOS</h3> <br><br>   
                <table class="table table-dark table-hover">
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

            </div>
        </div>
        <br><br><br>
        <div>
            <h1>Reservaciones por semana - octubre 4- 9</h1>
            <hr><br>
            <table>
                <tr>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
                <tr>
                    <td onclick="det()"><a href="">001</a></td>
                    <td onclick="det()"><a href="">002</a></td>
                    <td onclick="det()">
                        <a href="">006</a>
                    </td>
                    <td onclick="det()"><a href="">004</a></td>
                </tr>
                <tr>
                    <td onclick="det()"><a href="">003</a></td>
                    <td onclick="det()"><a href="">004</a></td>
                    <td onclick="det()">
                        <a href=""></a>
                    </td>
                    <td onclick="det()">
                        <a href=""></a>
                    </td>
                    <td onclick="det()"><a href="">005</a></td>

                </tr>
                <tr>
                    <td onclick="det()"><a href="">002</a></td>
                    <td onclick="det()"><a href="">003</a></td>
                    <td onclick="det()">
                        <a href=""></a>
                    </td>
                    <td onclick="det()"><a href="">006</a></td>
                </tr>
                <tr>
                    <td onclick="det()"><a href="">005</a></td>
                    <td onclick="det()"><a href="">003</a></td>
                    <td onclick="det()">
                        <a href=""></a>
                    </td>
                    <td onclick="det()"><a href="">002</a></td>
                </tr>
                <tr>
                    <td onclick="det()"><a href="">003</a></td>
                    <td onclick="det()"><a href="">001</a></td>
                    <td onclick="det()">
                        <a href=""></a>
                    </td>
                    <td onclick="det()"><a href="">003</a></td>
                </tr>
            </table><br><br>
        </div>
        <div>
            <h1>Tiempos disponibles - octubre 4- 9</h1>
            <hr><br>
            <table>
                <tr>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
                <tr>
                    <td>10:00 - 12:00, 15:00 - 17:00</td>
                    <td>12:00 - 13:50</td>
                    <td>15:00 - 17:00</td>
                    <td>7:00 - 11:00</td>
                    <td>10:00 - 12:00</td>
                </tr>
            </table><br><br>
        </div>
        <div>
            <form action="">
                <h2>Comentario o novedad de la semana</h2>
                <hr><br>
                <input type="text">
                <input type="submit" class="submit" value="Registrar comentario" onclick="alert('Se ha registrado el comentario')">
            </form><br><br>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="javascript/wroker.js"></script>
    <script src="javascript/postImg.js"></script>

</body>

</html>