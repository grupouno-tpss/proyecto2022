<?php
class App
{
    public function __construct()
    {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $archivoController = 'controllers/' . $url[0] . '.php';
        if (file_exists($archivoController)) {
            require $archivoController;
            $controller = new $url[0];

            if (isset($url[1])) {
                $controller->{$url[1]}();
                die();
            }
            // } else {
            //     $controller->render();
            // }
        } else {
            echo "404 -  No se ha encontrado la página";
        }
        die();
    }
}
