<?php


class login extends Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->view->render('login', null);
    }
    public function consultUser()
    {
        extract($_REQUEST);
        //echo "<script>alert('funcion consultar usuario')</script>";
        $this->loadModel('usuario');
        $this->nameClass->login(
            $_REQUEST['user'],
            $_REQUEST['password']
        );
       header('Location: '.constant('URL').'/options');
    }
}
