<?php
    class registrarse extends Controller {
        public function __construct()
        {
            parent::__construct();

            $this->view->render('registrarse', null);
        }

        public function addUser(){
            extract($_REQUEST);

            $idGenerated = rand();

            $this->loadModel('usuario');
            $this->nameClass->insertar(
                $idGenerated,
                $_REQUEST['p_nombre'],
                $_REQUEST['s_nombre'],
                $_REQUEST['p_apellido'],
                $_REQUEST['s_apellido'],
                $_REQUEST['email'],
                $_REQUEST['telefono'],
                $_REQUEST['telcelular'],
                $_REQUEST['contraseña'],
            );

            
        }
    }
?>