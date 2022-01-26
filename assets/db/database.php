<?php 
//mysqli_close($conn);

class DatabaseHelper{
    private $conn;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->conn = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        echo "Connessione OK" ;      
    }

    /* Devo fare una funzione che mi faccia un query e mi restituisca tutti gli ordini di un utente */
    public function getOrdersByUser($userID){ //extract elements that belongs to specified set
        $stmt = $this->conn->prepare("SELECT * FROM totalorders WHERE userID=?");
        $stmt-> bind_param("s",$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        echo "Query fatta";
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

class Manager{
    private $dbh;

    public function __construct() {
        $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
    }


    /*
    getALlOrders() 
    Questa funzione dovrà restituire lo storico di  tutti gli ordini che il cliente ha effettuato 
    */
}

$dbhelper = new DatabaseHelper("localhost","root","", "drinkdb",3306);
$resQuery = $dbhelper->getOrdersByUser("Nick987");
/*
foreach ($resQuery as $tmp) {
    $orderID = $tmp["orderID"];
    echo "<br> $orderID"; 
    $user = $tmp["userID"];
    echo "<br> $user";
    $date = $tmp["date"];
    echo "<br> $date";
    $time = $tmp["time"];
    echo "<br> $time";
    $state = $tmp["state"];
    echo "<br> $state";
}
*/


?>

