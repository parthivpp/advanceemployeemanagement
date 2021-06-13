<?php

    class dbConnection{
        private string $host = 'localhost';
        private string $db_name = 'employeemanagementsystem';
        private string $username= 'root';
        private string $password = '';
        private  $conn;

        public function connect(){
            $this->conn = null;
            try{
                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username,$this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $p){

            }
            return $this->conn;
        }
       
    }
?>