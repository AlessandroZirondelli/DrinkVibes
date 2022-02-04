<?php 
//mysqli_close($conn);

class DatabaseHelper{
    private $conn;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->conn = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        //echo "Connessione OK" ;      
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


    /* FETCH ALL Devo fare una funzione che mi faccia un query e mi restituisca tutti gli ordini di un utente */
    public function getOrdersByUser($userID){ //extract elements that belongs to specified set
        $stmt = $this->conn->prepare("SELECT * FROM totalorders WHERE userID=?");
        $stmt-> bind_param("s",$userID);
        $stmt->execute();
        $result = $stmt->get_result();
            //echo "Query fatta";
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    /*FETCH ALL.Questa funzione restituisce tutti i dettagli ordine relativi allo specifico ordine */
    public function getOrderDetails($orderID){
        $stmt = $this->conn->prepare("SELECT * FROM orderdetails WHERE orderID=?");
        $stmt-> bind_param("i",$orderID);
        $stmt->execute();
        $result = $stmt->get_result();
        //echo "Query order details fatta";
        return $result->fetch_all(MYSQLI_ASSOC);
    }
        /* DATO ELBAORATO. Restituisce il nome di un prodotto, dato il suo ID. Oppure Custom drink. */ 
    public function getArticleName($articleID){
        $stmt = $this->conn->prepare("SELECT name FROM product  WHERE productID=?");
        $stmt-> bind_param("i",$articleID);
        $stmt->execute();
        $result = $stmt->get_result();
        //echo "Query article name details fatta";
        $res = $result->fetch_all(MYSQLI_ASSOC);
        if (!$res){ //se non ho trovato alcuna corrispondenza allora cerco nella tabella drinkhandmade 
            return "Custom drink";
        }
        return $res[0]["name"];
    }
    
    public function getSubtotalPrice($orderID,$articleID){ 
        $stmt = $this->conn->prepare("SELECT subtotal FROM orderdetails  WHERE orderID=? AND articID=?");
        $stmt-> bind_param("ii",$orderID,$articleID);
        $stmt->execute();
        $result = $stmt->get_result();
        echo "Query article price fatta";
        $res = $result->fetch_all(MYSQLI_ASSOC);
        return $res[0]["subtotal"];
    }

    public function insertOrderState($state,$orderID){
        $query = "UPDATE totalorders SET state=? WHERE orderID=? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si',$titoloarticolo, $orderID);
        $stmt->execute();
    }
    
    /*
    private function getUnitIngredientPrice(){
        $stmt = $this->conn->prepare("SELECT price FROM unitingredient  WHERE productID=?");
        $stmt-> bind_param("i",$articleID);
        $stmt->execute();
        $result = $stmt->get_result();
        $res = $result->fetch_all(MYSQLI_ASSOC);
    }

    private function getLiquidIngredientPrice(){
        $stmt = $this->conn->prepare("SELECT price FROM liquidingredient  WHERE productID=?");
        $stmt-> bind_param("i",$articleID);
        $stmt->execute();
        $result = $stmt->get_result();
        $res = $result->fetch_all(MYSQLI_ASSOC);
    }
*/
    /*DATO ELABORATO. Restituisce il subtotal */

}

/*
$dbhelper = new DatabaseHelper("localhost","root","", "drinkdb",3306);

$resQuery = $dbhelper->getSubtotalPrice(1,2);
echo "$resQuery";
*/

?>

