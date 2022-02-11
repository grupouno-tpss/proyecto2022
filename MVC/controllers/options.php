<?php
    class options extends Controller {
        public function __construct()
        {
            parent::__construct();

            $this->view->render('options', null);
        }
    }
?>