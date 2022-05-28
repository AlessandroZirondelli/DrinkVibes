<?php 
//mysqli_close($conn);

class DatabaseHelper{
    private $conn;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->conn = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
        //echo "Connessione OK" ;      
    }
    public function insertOrder($idOrder,$idUser,$date,$time,$state,$total){
        $query = "INSERT INTO totalorders (orderID, userID, date, time, state, total) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('issssd',$idOrder,$idUser,$date,$time,$state,$total);
        $stmt->execute();
    }                          
    public function insertIngredient($name,$imageUrl,$description,$quantity,$category,$typology,$price){
        $query = "INSERT INTO ingredient (name, qtystock, price, description, typology, category,imageURL ) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sidssss',$name,$quantity,$price,$description,$typology,$category,$imageUrl);
        $stmt->execute();
    }
    public function deleteIngredient($id){
      /*  $query = " DELETE FROM Ingredient WHERE ingredientID= ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();*/
        $query = "UPDATE ingredient SET deleteIngredient = 1 WHERE ingredientID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt-> bind_param("i",$id);
        $stmt->execute();
    }
    
    public function updateIngredient($id,$quantity){
        $query = "UPDATE ingredient SET qtystock = ? WHERE ingredientID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt-> bind_param("ii",$quantity,$id);
        $stmt->execute();
    }
    public function getIngredientById($ingredientID){
        $query = "SELECT * FROM ingredient WHERE ingredientID=?";
        if($stmt = $this->conn->prepare($query)){
            $stmt->bind_param('i',$ingredientID);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
        
    }
    public function getProductById($productID){
        $query = "SELECT * FROM product WHERE productID=?";
        if($stmt = $this->conn->prepare($query)){
            $stmt->bind_param('i',$productID);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC)[0]["qtystock"];
        }else{
            return NULL;
        }
        
    }
    public function getUserByUserId($userId){
        $query = "SELECT * FROM user WHERE userID=?";
        if($stmt = $this->conn->prepare($query)){
            $stmt->bind_param('s',$userId);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
        
    }
    public function getIngredientByCategory($category){
       
        $query = "SELECT * FROM ingredient WHERE category=? AND deleteIngredient = 0 ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->bind_param('s',$category);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
        
    }
    public function getIngredientByTypology($typology){
        $query = "SELECT * FROM ingredient WHERE typology=? AND deleteIngredient = 0 ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->bind_param('s',$typology);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
        
    }
    public function getAlcoholIngredient(){
        $query = "SELECT * FROM ingredient WHERE (typology='Spirit' OR typology='Wine') AND deleteIngredient = 0 ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
        
    }
    public function getMaxIngredientId(){
        $query = "SELECT MAX(ingredientID) as max_id FROM ingredient; ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
        
    }
    public function getMaxProductId(){
        $query = "SELECT MAX(productID) as max_id FROM product; ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
        
    }
    public function getMaxHandMadeDrinkId(){
        $query = "SELECT MAX(drinkID) as max_id FROM drinkhandmade; ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
        
    }
    public function getMaxOrdertId(){
        $query = "SELECT MAX(orderID) as max_id FROM totalorders; ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
        
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
    
    public function insertOrderState($state,$orderID){
        $query = "UPDATE totalorders SET state=? WHERE orderID=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si',$state, $orderID);
        $stmt->execute();
    }

    public function getAllOrdersFromAllUsers(){
        $stmt = $this->conn->prepare("SELECT * FROM totalorders");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotDeliveredOrders(){
        $stmt = $this->conn->prepare("SELECT * FROM totalorders WHERE state!='Delivered' ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); 
    }

    public function getExpressOrders(){
        $stmt = $this->conn->prepare("SELECT * FROM totalorders WHERE state!='Delivered' AND state!='To prepare' ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); 
    }    

    public function getNotDeliveredOrdersByUser($userID){
        $stmt = $this->conn->prepare("SELECT * FROM totalorders WHERE state!='Delivered' AND userID=?");
        $stmt-> bind_param("s",$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNameByUser($userID){
        $stmt = $this->conn->prepare("SELECT name FROM user WHERE userID=?");
        $stmt-> bind_param("s",$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $res= $result->fetch_all(MYSQLI_ASSOC);
        return $res[0]["name"];
    }
    public function getSurnameByUser($userID){
        $stmt = $this->conn->prepare("SELECT surname FROM user WHERE userID=?");
        $stmt-> bind_param("s",$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $res= $result->fetch_all(MYSQLI_ASSOC);
        return $res[0]["surname"];
    }

    public function getUserIDByOrderID($orderID){
        $stmt = $this->conn->prepare("SELECT userID FROM totalorders WHERE orderID=?");
        $stmt-> bind_param("i",$orderID);
        $stmt->execute();
        $result = $stmt->get_result();
        $res= $result->fetch_all(MYSQLI_ASSOC);
        return $res[0]["userID"];
    }

    public function getStateByOrderID($orderID){
        $stmt = $this->conn->prepare("SELECT state FROM totalorders WHERE orderID=?");
        $stmt-> bind_param("i",$orderID);
        $stmt->execute();
        $result = $stmt->get_result();
        $res= $result->fetch_all(MYSQLI_ASSOC);
        return $res[0]["state"];
    }

    public function insertNotifOrderState($orderRef,$userRef,$changedState){
        $query = "INSERT INTO notiforderstate (orderRef, userRef, changedState,readed) VALUES (?, ?, ?, 0)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iss',$orderRef, $userRef, $changedState);
        $stmt->execute();
    }

    public function getAllNotificationsStateChangedByUser($userID){
        $stmt = $this->conn->prepare("SELECT orderRef,changedState,notifID  FROM notiforderstate WHERE userRef=? AND readed=0");
        $stmt-> bind_param("s",$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNotifOrderReady($orderRef,$userRef){
        $query = "INSERT INTO notiforderready (orderRef, userRef, readed) VALUES (?, ?, 0)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is',$orderRef, $userRef);
        $stmt->execute();
    }

    public function getAllNotificationsStateReady($userID){
        $stmt = $this->conn->prepare("SELECT orderRef,notifID  FROM notiforderready WHERE userRef=? AND readed=0");
        $stmt-> bind_param("s",$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNotifNewOrder($orderRef,$userRef,$description){
        $query = "INSERT INTO notifneworder (orderRef, userRef,description, readedUser, readedAmm) VALUES (?, ?, ?, 0,0)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iss',$orderRef, $userRef,$description);
        $stmt->execute();
    }

    public function getAllNotificationsNewOrder($userID,$type){
        if($type=="Admin"){ //if it's Admin then take all new orders of all users
            $stmt = $this->conn->prepare("SELECT orderRef,userRef,notifID,description FROM notifneworder WHERE readedAmm=0");  
        }
        else if($type=="User"){
            $stmt = $this->conn->prepare("SELECT orderRef,notifID,description FROM notifneworder WHERE readedUser=0 AND userRef=?");  
            $stmt-> bind_param("s",$userID);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertiNotifSoldout($articleIDRef,$articleNameRef){
        $query = "INSERT INTO notifsoldout (articleIDRef, articleNameRef, readed) VALUES (?, ?, 0)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is',$articleIDRef, $articleNameRef);
        $stmt->execute();
    }

    public function getAllNotificationsSoldout(){
        $stmt = $this->conn->prepare("SELECT articleIDRef,articleNameRef,notifID  FROM notifsoldout WHERE readed=0");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }    

    public function readNotificationNewOrderByUser($notifID){
        $query = "UPDATE notifneworder SET readedUser=1 WHERE notifID=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $notifID);
        $stmt->execute();
    }

    public function readNotificationNewOrderByAdmin($notifID){
        $query = "UPDATE notifneworder SET readedAmm=1 WHERE notifID=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $notifID);
        $stmt->execute();
    }

    public function readNotificationStateChangedByUser($notifID){
        $query = "UPDATE notiforderstate SET readed=1 WHERE notifID=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $notifID);
        $stmt->execute();
    }

    public function readNotificationOrderReadyByExpress($notifID){
        $query = "UPDATE notiforderready SET readed=1 WHERE notifID=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $notifID);
        $stmt->execute();
    }

    public function readNotificationSoldOutByAdmin($notifID){
        $query = "UPDATE notifsoldout SET readed=1 WHERE notifID=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $notifID);
        $stmt->execute();
    }

    public function getIngredientsCustomDrink($drinkID){
        $stmt = $this->conn->prepare("SELECT ingredientID,qty FROM drinkhandmade WHERE drinkID=?");
        $stmt-> bind_param("i",$drinkID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getIngredientName($ingredientID){
        $stmt = $this->conn->prepare("SELECT name FROM ingredient WHERE ingredientID=?");
        $stmt-> bind_param("i",$ingredientID);
        $stmt->execute();
        $result = $stmt->get_result();
        $res = $result->fetch_all(MYSQLI_ASSOC);
        return $res[0]["name"];
    }

    public function getCategoryOfIngredient($ingredientID){
        $stmt = $this->conn->prepare("SELECT category FROM ingredient WHERE ingredientID=?");
        $stmt-> bind_param("i",$ingredientID);
        $stmt->execute();
        $result = $stmt->get_result();
        $res = $result->fetch_all(MYSQLI_ASSOC);
        return $res[0]["category"];
    }

        
    public function checkLogin($userID, $password){
        $query = "SELECT password FROM user WHERE userID=? ";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('s', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $res =  $result->fetch_all(MYSQLI_ASSOC);
        if($res==null){
            return false;
        }
        $hashedPassword = $res[0]["password"];

        return password_verify($password,$hashedPassword);

    }   

    public function getInfoAccount($userID){
        $query = "SELECT userID,name,surname,email,type,birthdate FROM user WHERE userID=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return  $result->fetch_all(MYSQLI_ASSOC);

    }
    
    public function checkDuplication($userID, $email){
        $query = "SELECT * FROM user WHERE userID = ? OR email = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss',$userID, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);

    }
    //elimina prodotto da lista prodotti admin (uploadProduct)
    public function deleteProduct($id){
        $query = "UPDATE product SET deleteProduct = 1 WHERE productID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt-> bind_param("i",$id);
        $stmt->execute();
        /*$query = " DELETE FROM product WHERE productID= ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();*/
    }

    //aggiorna prodotto da lista prodotti admin (uploadProduct)
    public function updateProduct($id,$quantity){
        $query = "UPDATE product SET qtystock = ? WHERE productID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt-> bind_param("ii",$quantity,$id);
        $stmt->execute();
    }


    public function insertProduct($id,$name,$imageUrl,$description,$quantity,$typology,$price){
        $query = "INSERT INTO product (productID,name, qtystock, price, description, type ,imageURL ) VALUES (?,?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('isidsss',$id,$name,$quantity,$price,$description,$typology,$imageUrl);
        $stmt->execute();
    }


    public function getProductsById($productID){
        $query = "SELECT * FROM product WHERE productID = ?";
        if($stmt = $this->conn->prepare($query)){
            $stmt->bind_param('i', $productID);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return NULL;
        }

    }

    public function insertAccount($userID, $name, $surname, $email, $password, $type, $birthdate){
        //INSERT INTO user (userID, name, surname, type ,email, password, birthdate ) VALUES ( "PIPPOOOO", "vjguvgj", "jhvuhvj", "jhvjhvj", "vjhjhvjh", "hkbkbsbh", 2005-12-26)
        //$query = 'INSERT INTO user (userID, name, surname, type ,email, password, birthdate) VALUES ( '.$userID.','.$name.','.$surname.','.$type.','.$email.','.$password.','.$birthdate.')';
        $query = "INSERT INTO user (userID, name, surname, type ,email, password, birthdate) VALUES (?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $hashPassword = password_hash($password,PASSWORD_DEFAULT);
        $stmt->bind_param('sssssss',$userID, $name, $surname, $type, $email , $hashPassword, $birthdate );
        $stmt->execute();
    }

    public function getProduct() {
        $query = "SELECT * FROM product WHERE deleteProduct = 0 ORDER BY productID ASC ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
    }
    
    public function getProductByType($type){
        $query = "SELECT * FROM product WHERE type=? AND deleteProduct = 0 ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->bind_param('s',$type);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
    }
    public function getNewProductId(){
        $query = "SELECT MAX(productID) as max_id FROM product; ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }else{
            return NULL;
        }
        
    }

    public function insertHandMadeDrink($drinkID,$ingredientID,$qty){
        $query = "INSERT INTO drinkhandmade (drinkID, ingredientID, qty) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iii',$drinkID,$ingredientID,$qty);
        $stmt->execute();
    }

    public function getLastOrderID(){
        $query = "SELECT MAX(orderID) as max_id FROM totalorders; ";
        if($stmt = $this->conn->prepare($query)){
            $stmt->execute();
            $result = $stmt->get_result();
            $res = $result->fetch_all(MYSQLI_ASSOC);
            return $res[0]["max_id"];
        }
    }

    public function addOrderDetail($orderID,$articID,$qty,$subtotal,$description){
        $query = "INSERT INTO orderdetails (orderID, articID, qty, subtotal, description) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iiids',$orderID,$articID,$qty,$subtotal,$description);
        $stmt->execute();
    }
    //($orderID, $userID, $articleID, $quantity,$subtotal,$description)
    public function addTotalOrder($orderID, $userID, $date, $time,$state,$total){
        $query = "INSERT INTO totalorders (orderID, userID, date, time,state,total) VALUES (?, ?, ?, ?, ?, ?)";
        if($stmt = $this->conn->prepare($query)){
            $stmt->bind_param('issssd',$orderID,$userID,$date,$time,$state,$total);
            $stmt->execute();
            echo "OK";
        }else{
            echo "NO";
        }
    }
}

/*
$dbh =  new DatabaseHelper("localhost", "root", "", "drinkdb",3306);
echo $dbh-> checkLogin("Pippo","pippo");
*/
?>

