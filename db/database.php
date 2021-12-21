<?php 
//mysqli_close($conn);

class DatabaseHelper{
    private $conn;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->conn = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }        
    }
}

class Manager{
    private $dbh;

    public function __construct() {
        $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
    }
}


?>

