<?php

class Database{

    // specify your own database credentials
    private $host;
    private $db_name;
    private $username;
    private $password;

    function __construct(){
        $this->host 	= $GLOBALS['DB_HOST'];
        $this->db_name 	= $GLOBALS['DB_NAME'];
        $this->username = $GLOBALS['DB_USER'];
        $this->password = $GLOBALS['DB_PASS'];
	}


    // get the database connection
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

$database = new Database();
$db = $database->getConnection();


?>
