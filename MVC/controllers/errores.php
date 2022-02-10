<?php
    class notFound extends Controller {
        public function __construct()
        {
            parent::__construct();

            $this->view->render('notFound');
        }
    }
?>