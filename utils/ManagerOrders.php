<?php
require_once("./Order.php"); // include anche OrderDetails.php
require_once("./../assets/db/database.php");
    class ManagerOrders{
        private $dbh;
        private $orders;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
            $this-> orders = array();
        }

        public function addNewOrder($order){
            array_push($this-> orders, $order );
        }

        public function createOrdersByUser($userID){
            $allOrders=$this-> dbh-> getOrdersByUser($userID);
            /* questo ciclo serve per creare un oggetto Ordine per ogni singolo ordine sul DB fatto 
            da uno specifico user*/
            foreach ($allOrders as $tmp){

                //Informazioni di base
                $orderID = $tmp["orderID"];
                $date = $tmp["date"];
                $time = $tmp["time"];
                $state = $tmp["state"];
                $user = $tmp["userID"]; //$user = $userID 

                $newOrder = new Order($user,$orderID,$date,$time,$state);
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

                $this->addNewOrder($newOrder);
                
            }

            /*foreach($this->orders as $tmp){
                $tmp->toString();
            }*/
        }

       


        /*
            DATO ELABORATO. Questa funzione dovrà restituire lo storico di  tutti gli ordini che il cliente ha effettuato 
        */
        public function getAllOrders(){
             return $this->orders;   
        }
        
    }


    $man = new ManagerOrders();
    $man->createOrdersByUser("Nick987");

?>