<?php

    class Database 
    {

        private $db_host = "127.0.0.1";
        private $db_username = "root";
        private $db_password = "";
        private $db_name = "test";

        public function connect()
        {
            try{
                $conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_username, $this->db_password);
                $conn->exec('SET NAMES utf8mb4');
                return $conn;
            }catch(Exception $e){
                echo "Connected Fail : " . $e->getMessage();
            }
        }

    }