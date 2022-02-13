<?php
session_start();

class reservaciones extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('reserva');
        $reserve = $this->reservations();
        $this->view->render('reservaciones', $reserve);
    }

    public function reservations()
    {
        return $this->nameClass->reservations();
    }
}
