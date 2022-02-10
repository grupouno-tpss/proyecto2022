<?php
    class Controller{
        public function __construct()
        {
            $this->view = new View();
        }

        public function loadModel ($model) {
            $url = 'models/'.$model.'model.php';

            require $url;

            $urlName = $model. 'Model';

            $this->nameClass = new $urlName();
        }
    }
?>