<?php
session_start();
    class reserva extends Controller {
        public function __construct()
        {
            parent::__construct();
            $this->loadModel('reserva');
            $hours = $this->schedules();
            $this->view->render('reserva', $hours);
        }

        public function addReserve(){
            extract($_REQUEST);

            $idGenerated = rand();
            $this->nameClass->insertReserve(
                $idGenerated,
                $_REQUEST['fecha'], 
                $_REQUEST['hora'], 
                $_REQUEST['cantPersonas'], 
                $_REQUEST['tipoServicio'], 
                $_REQUEST['especificacion'], 
                $_REQUEST['menu']
            );

            
        }

        public function schedules() {
            return $this->nameClass->dates();
        }

        public function reservations () {
            
        }
    }
?>