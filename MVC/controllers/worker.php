<?php
    class worker extends Controller {
        public function __construct()
        {
            parent::__construct();

            $this->view->render('worker');
        }
    }
?>