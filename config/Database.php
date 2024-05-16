<?php 

    class Database {
        private $host = "localhost";
        private $db = "login_regis_db";
        private $username = "root";
        private $password = "";
        public $conn;

        public function getConnection() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=". $this->host . ";dbname=" . $this->db, $this->username, $this->password);
            } catch(PDOException $exception) {
                echo "Connection Error: " . $exception->getMessage();
            }

            return $this->conn;
        }
    }

?>