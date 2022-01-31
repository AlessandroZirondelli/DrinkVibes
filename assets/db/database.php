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
    public function getLiquindIngredientByType($idcategory){
        $query = "SELECT * FROM liquidingredient";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getLiquindIngredient(){
        $query = "SELECT * FROM liquidingredient";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getUnityIngredient(){
        $query = "SELECT * FROM unitingredient";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

class Manager{
    private $dbh;

    public function __construct() {
        $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
    }

}

?>

