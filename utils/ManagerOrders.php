<?php
/*
Questi percorsi vanno bene in riferimento a questo file "ManagerOrders.php
Ma non vanno bene , dal file "Ordrs.php" in cui faccio il require_once.

require_once("./Order.php"); // include anche OrderDetails.php
require_once("./../assets/db/database.php");*/

require_once("./utils/Order.php");
require_once("./assets/db/database.php");

    class ManagerOrders{
        private $dbh;
        private $ordersTab1;
        private $ordersTab2;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
            $this-> ordersTab1 = array();
            $this-> ordersTab2 = array();
        }

        public function addNewOrderTab1($order){
            array_push($this-> ordersTab1, $order );
        }
        public function addNewOrderTab2($order){
            array_push($this-> ordersTab2, $order );
        }

        public function createOrdersTab($userID,$type){ // gestisce entrambi gli array ordersTab1 e ordersTab2
            
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
            
        
            //qui avrò un ciclo1 e un ciclo2 per i due array
            foreach ($ordersTabTmp1 as $tmp){

                //Informazioni di base
                $orderID = $tmp["orderID"];
                $date = $tmp["date"];
                $time = $tmp["time"];
                $state = $tmp["state"];
                $user = $tmp["userID"]; //$user = $userID 
                $total = $tmp["total"];

                $newOrder = new Order($user,$orderID,$date,$time,$state,$total);
                //$newOrder->toString();

                //Ora devo aggiungere le informazioni relative ai vari dettagli ordine
                $orderDetails = $this-> dbh -> getOrderDetails($orderID); 
                foreach ($orderDetails as $detail){ //aggiungo tutti i dettagli di quell'ordine
                    $articID = $detail["articID"];
                    $qty = $detail["qty"];
                    $subtotal = $detail["subtotal"];
                    $articName = $this->dbh->getArticleName($articID);

                    $newDetail = new OrderDetail($orderID,$articName,$articID,$qty,$subtotal);
                    //$newDetail->toString();
                    $newOrder-> addOrderDetail($newDetail); //aggiungo il dettaglio ordine
                    
                }

                $this->addNewOrderTab1($newOrder);
                
            }

            if($type!="Express"){
                foreach ($ordersTabTmp2 as $tmp){

                    //Informazioni di base
                    $orderID = $tmp["orderID"];
                    $date = $tmp["date"];
                    $time = $tmp["time"];
                    $state = $tmp["state"];
                    $user = $tmp["userID"]; //$user = $userID 
                    $total = $tmp["total"];
    
                    $newOrder = new Order($user,$orderID,$date,$time,$state,$total);
                    //$newOrder->toString();
    
                    //Ora devo aggiungere le informazioni relative ai vari dettagli ordine
                    $orderDetails = $this-> dbh -> getOrderDetails($orderID); 
                    foreach ($orderDetails as $detail){ //aggiungo tutti i dettagli di quell'ordine
                        $articID = $detail["articID"];
                        $qty = $detail["qty"];
                        $subtotal = $detail["subtotal"];
                        $articName = $this->dbh->getArticleName($articID);
    
                        $newDetail = new OrderDetail($orderID,$articName,$articID,$qty,$subtotal);
                        //$newDetail->toString();
                        $newOrder-> addOrderDetail($newDetail); //aggiungo il dettaglio ordine
                        
                    }
    
                    $this->addNewOrderTab2($newOrder);
                    
                }
    

            }

        }

       


        /*
            DATO ELABORATO. Questa funzione dovrà restituire lo storico di  tutti gli ordini che il cliente ha effettuato 
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
        
    }


   /* $man = new ManagerOrders();
    $man->createOrdersByUser("Nick987");
*/
?>