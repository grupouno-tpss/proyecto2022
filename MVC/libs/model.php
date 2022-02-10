<?php
    class Model{
        public function __construct()
        {
            $connectData = new Database(
                constant('HOST'),
                constant('USER'),
                constant('PASSWORD'),
                constant('DB'),
            );
            $this->db = $connectData->connect();
        }
    }
?>