<?php
session_start();
// session_start();
// if (isset($_SESSION["usuario"]) and $_SESSION["contraseña"] and $_SESSION["rol"]) {
//     echo 'Session iniciada';
// } else {
//     echo "No ha   iniciado sección";
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

    <link rel="stylesheet" href="../css/admint.css"> --
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php
    // include "pages/loading.php";
    include "pages/nav.php";
    ?> 
    
        <br> <br> <br>
        <div class="content">
        <a href="#" onclick='req("multimedia/admint.png")'>RF</a>
        <br>
        
        <h1> 
            <div class="titulos">Seleccione una opción</div>
        </h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#informeModal" id="informeBotton">
            Realizar informe
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="informeModal" tabindex="-1" aria-labelledby="informeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="informeModalLabel">GENERAR INFORME</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div>
                            <div class="admint2">

                                <form action="">
                                    <label for="fecha">Establecer una fecha</label>
                                    <input type="date" class="form-control">
                                    <br>
                                    <label for="hora">Establecer una hora</label>
                                    <br>
                                    <input type="time" class="form-control">
                                    <br>
    
                                </form>
                            </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                                <button type="button" class="btn btn-primary">Generar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form><br><br><br>
        </div>
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#empleadosRegistradosModal" id="empleadosRegistradosBotton">
            Usuarios
            </button>

        <!-- Modal -->
            <div class="modal fade" id="empleadosRegistradosModal" tabindex="-1" aria-labelledby="empleadosRegistradosModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="empleadosRegistradosModalLabel">CRUD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>        
            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrousuarioModal" id="registrousuarioBotton">
                    Registrar usuario
                </button>

            <!-- Modal -->
                <div class="modal fade" id="registrousuarioModal" tabindex="-1" aria-labelledby="registrousuarioModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="registrousuarioModalLabel">Registro de usuarios</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <label for="">Ingrese su Nombre</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Primer nombre" aria-label="p_nombre">
    
                                        <input type="text" class="form-control" placeholder="Segundo nombre" aria-label="s_nombre">
    
                                    </div>
    
                                    <label for="">Ingrese su Apellido</label>
                                    <div class="input-group mb-3">
    
                                        <input type="text" class="form-control" placeholder="Primer Apellido" aria-label="p_Apellido">
    
                                        <input type="text" class="form-control" placeholder="Segundo Apellido" aria-label="s_Apellido">
    
    
                                    </div>
                                    <label for="">Ingrese sus Numeros de contacto</label>
                                    <div class="input-group mb-3">
    
                                        <input type="text" class="form-control" placeholder="Numero Celular" aria-label="numeroCelular">
    
                                        <input type="text" class="form-control" placeholder="Numero Telefono" aria-label="numeroTelefono">
    
                                    </div>
                                    <label for="">Ingrese su Correo electronico</label>
                                    <div class="input-group mb-3">
                                    
                                        <input type="email" class="form-control" placeholder="Correo electronico" aria-label="email" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                                    </div>
                                    
                                    <div class="container">
                                    
                                    <div class="conf">Ingrese la contraseña</div>
                                
                                    <input type="password" class="form-control" placeholder="Contraseña" aria-label="contraseña">
                                    </div>
                                    </div> 
                            </form>
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                            <button type="button" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </div>
                    <h1> 
                        <div class="titulos">Aqui va la tabla</div>
                    </h1>
                </div>
                
            </div>
            <br><br><br>
            
            <hr><br>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
