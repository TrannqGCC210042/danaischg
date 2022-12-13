<?php
    class Connect{
        public $server;
        public $user;
        public $password;
        public $dbName;

        public function __construct()
        {
            $this->server = "localhost";
            $this->user = "root";
            $this->password = "";
            $this->dbName = "danaischgstore_tran";
        }

        //Option 1: user mysqli
        function connectToMySQL():mysqli{
            $conn_my = new mysqli($this->server, $this->user, $this->password, $this->dbName);
            if($conn_my->connect_error){
                die("Failed".$conn_my->connect_error);
            }else{
                // echo "Connect to My SQL!!!!!!";
            }

            return $conn_my;
        }

        //Option 2: user PDO
        function connectToPDO():PDO{
            try {
                $conn_pdo = new PDO("mysql:host=$this->server;dbname=$this->dbName", $this->user, $this->password);
                // echo "Connect to PDO!!!!!!!!!!!!";
            } catch (Throwable $th) {
                die("Failed $th");
            }

            return $conn_pdo;
        }
    }
