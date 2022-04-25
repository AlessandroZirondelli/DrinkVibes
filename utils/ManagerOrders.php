<?php
/*
These paths are correct if they refers to this files
But these are wrong  refers to file "Orders.php" where there is require_once.
require_once("./Order.php"); // includes also Order.php
require_once("./../assets/db/database.php");

require_once("./Order.php"); // include anche OrderDetails.php
require_once("./../assets/db/database.php");*/

//require_once("./utils/Order.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/utils/Order.php");
//require_once("./assets/db/database.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/assets/db/database.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/utils/ManagerHandMakeDrink.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/utils/HandMadeDrink.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/utils/Ingredient.php");
//require_once("./ManagerHandMakeDrink.php");

//session_start();

    class ManagerOrders{
        private $dbh;
        private $ordersTab1;
        private $ordersTab2;
        private $managerHandMakeDrink;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
            $this-> ordersTab1 = array();
            $this-> ordersTab2 = array();
            $this -> managerHandMakeDrink = new ManagerHandMakeDrink();
        }

        public function addNewOrderTab1($order){
            array_push($this-> ordersTab1, $order );
        }
        public function addNewOrderTab2($order){
            array_push($this-> ordersTab2, $order );
        }

        public function createOrdersTab($userID,$type){ // manage all  arrays ordersTab1 and ordersTab2
            
            if($type == "Admin"){
                $ordersTabTmp1=$this-> dbh-> getAllOrdersFromAllUsers();
                $ordersTabTmp2=$this-> dbh-> getNotDeliveredOrders();
            }
            if($type == "Express"){
                $ordersTabTmp1=$this-> dbh -> getExpressOrders();
            }

            if($type == "User"){
                $ordersTabTmp1=$this-> dbh-> getOrdersByUser($userID);
                $ordersTabTmp2=$this-> dbh-> getNotDeliveredOrdersByUser($userID);
            }
            
            foreach ($ordersTabTmp1 as $tmp){

                //Base information
                $orderID = $tmp["orderID"];
                $date = $tmp["date"];
                $time = $tmp["time"];
                $state = $tmp["state"];
                $user = $tmp["userID"]; //$user = $userID 
                $total = $tmp["total"];

                $newOrder = new Order($user,$orderID,$date,$time,$state,$total);
                //$newOrder->toString();

                //Add information about order details
                $orderDetails = $this-> dbh -> getOrderDetails($orderID); 
                foreach ($orderDetails as $detail){ 
                    $articID = $detail["articID"];
                    $qty = $detail["qty"];
                    $subtotal = $detail["subtotal"];
                    $articName = $this->dbh->getArticleName($articID);
                    $description = $detail["description"];
                    $newDetail = new OrderDetail($orderID,$articName,$articID,$qty,$subtotal,$description);
                    $newOrder-> addOrderDetail($newDetail);
                    
                }

                $this->addNewOrderTab1($newOrder);
                
            }

            if($type!="Express"){
                foreach ($ordersTabTmp2 as $tmp){

                    //Base information
                    $orderID = $tmp["orderID"];
                    $date = $tmp["date"];
                    $time = $tmp["time"];
                    $state = $tmp["state"];
                    $user = $tmp["userID"];  
                    $total = $tmp["total"];
    
                    $newOrder = new Order($user,$orderID,$date,$time,$state,$total);
    
                    $orderDetails = $this-> dbh -> getOrderDetails($orderID); 
                    foreach ($orderDetails as $detail){ //aggiungo tutti i dettagli di quell'ordine
                        $articID = $detail["articID"];
                        $qty = $detail["qty"];
                        $subtotal = $detail["subtotal"];
                        $articName = $this->dbh->getArticleName($articID);
                        $description = $detail["description"];
                        $newDetail = new OrderDetail($orderID,$articName,$articID,$qty,$subtotal,$description);
                        $newOrder-> addOrderDetail($newDetail);
                        
                    }
    
                    $this->addNewOrderTab2($newOrder);  
                }
            }
        }

       


        /*
            ELABORATED DATA. This function returns all orders 
        */
        public function getOrdersTab1(){
            return $this->ordersTab1;   
        }
        public function getOrdersTab2(){
            return $this->ordersTab2;   
            
        }

        public function getRecipientName($orderID){
            $userID= $this->dbh->getUserIDByOrderID($orderID);
            $name= $this->dbh->getNameByUser($userID);
            $surname = $this->dbh->getSurnameByUser($userID);
            return $name." ".$surname;
        }

        public function addOrderDetail($orderDetail){
            $this->dbh->addOrderDetail($orderDetail->getOrderID(),$orderDetail->getArticleID(),$orderDetail->getQuantity(),$orderDetail->getSubtotal(), $orderDetail->getDescription());
            //$orderID,$articID,$qty,$subtotal,$description
        }

        public function insertOrder(){
            //session_start();
            $userID = $_SESSION["userID"];
            $date = date("Y-m-d");
            $time = date("h:i:s");
            $state = "To prepare";
            $total = 0;
            $orderID = ($this->dbh->getLastOrderID())+1;

                                //($userID, $orderID, $date, $time, $state, $total)
            $newOrder = new Order($userID,$orderID,$date,$time,$state,$total);
            //($orderID, $articleName, $articleID, $quantity,$subtotal,$description)

            $list_drink = unserialize( $_SESSION["shopping_cart_hmd"]);
            //inserisco order details come drinkhandmade
            foreach( $list_drink as $handmadedrink){

                $newIdHandMadeDrink = $this -> dbh -> getMaxHandMadeDrinkId()[0]["max_id"] + 1 ;
                $newIdProduct = $this -> dbh -> getMaxProductId()[0]["max_id"] + 1; 
                if( $newIdHandMadeDrink > $newIdProduct){
                    $drinkID = $newIdHandMadeDrink;
                }else{
                    $drinkID = $newIdProduct;
                }
                //guardo tutti gli ingredienti che ha il drink hand made
                foreach($handmadedrink[0]->getIngredient() as $ingredient){
                    $qtySingleIngredient = $ingredient->getQty();
                    $idSingleIngredient  = $ingredient -> getIngredientID(); //($drinkID, $ingredientID, $qty)
                    $this->managerHandMakeDrink->addHandMadeDrink($drinkID,$idSingleIngredient,$qtySingleIngredient);
                }
                //$orderID, $articleName, $articleID, $quantity,$subtotal,$description)
                $orderDetail = new OrderDetail($orderID,"",$drinkID,$handmadedrink[1],$handmadedrink[0]->getTotalPrice()*$handmadedrink[1],"Custom drink");
                $total= $total + $handmadedrink[0]->getTotalPrice()*$handmadedrink[1]; //incremento il toale dell'ordine
                //qty dell'order details  handmadedrink[1]
                $this->addOrderDetail($orderDetail);
            }
            /*
            //inserisco order details come products
            foreach( $list_product as $product){

                //guardo tutti gli ingredienti che ha il drink hand made
                
                //$orderID, $articleName, $articleID, $quantity,$subtotal,$description)
                $orderDetail = new OrderDetail($orderID,"",$drinkID,$handmadedrink[1],$handmadedrink[0]->getTotalPrice()*$handmadedrink[1],"Custom drink");
                $total= $total + $handmadedrink[0]->getTotalPrice()*$handmadedrink[1]; //incremento il toale dell'ordine
                //qty dell'order details  handmadedrink[1]
                $this->addOrderDetail($orderDetail);
            }
*/

           //($orderID, $userID, $date, $time,$state,$total)
           $this->dbh->addTotalOrder($orderID,$userID,$date,$time,$state,$total);
            //devo settare il totale
        }
        
    }
?>