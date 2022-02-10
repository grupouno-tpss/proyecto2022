<?php
    class Database {
        private $host;
        private $db;
        private $user;
        private $password;

        public function __construct($host, $user, $password, $db)
        {
            $this->host = $host;
            $this->db = $db;
            $this->user =  $user;
            $this->password = $password;
        }

        public function connect () {
            $connect = mysqli_connect($this->host, $this->user, $this->password, $this->db);
            return $connect;
        }
    }
?>