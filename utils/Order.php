<?php
/* QUesto percorso va bene in riferimento ad Order, ma non in riferimento a orders.php dove cè il require once
require_once("./OrderDetail.php");
*/

require_once("./utils/OrderDetail.php");
class Order{
    private $userID;
    private $orderID;
    private $date;
    private $time;
    private $state;
    private $orderDetails;
    private $total;

    public function __construct($userID, $orderID, $date, $time, $state, $total){
         $this-> userID = $userID;
         $this-> orderID = $orderID;
         $this-> date = $date;
         $this-> time = $time;
         $this-> state = $state;
         $this-> orderDetails = array();
         $this-> total = $total;
    }

    public function setUserID($userID){
        $this->userID = $userID;
    }
    public function getUserID(){
        return $this->userID;
    }

    public function setOrderID($orderID){
        $this->orderID = $orderID;
    }
    
    public function getOrderID(){
        return $this->orderID;
    }

    public function setDate($date){
        $this-> date = $date;
    }
    
    public function getDate(){
        return $this->date;
    }

    public function setTime($time){
        $this-> time = $time;
    }
    
    public function getTime(){
        return $this-> time;
    }

    public function setState($state){
        $this-> state = $state;
    }
    
    public function getState(){
        return $this->state;
    }

    public function setOrderDetails($arr){
        $this-> orderDetails = $arr;
    }

    public function getOrderDetails(){
        return $this->orderDetails;
    }

    public function setTotal($total){
        $this-> total = $total;
    }

    public function getTotal(){
        return $this->total;
    }

    public function addOrderDetail($detail){ // it takes OrderDetail object
        array_push($this->orderDetails,$detail);
    }

    public function toString(){
        echo "orderID:$this->orderID "."userID: $this->userID "."date: $this->date "."time: $this->time "."state: $this->state ";
        foreach($this->orderDetails as $tmp){
            $tmp->toString();
        }
    }


   
}

/*
$order = new Order("Nick987",12,"12-09-2000","23:54","Delivered");
$orderDetailFirst = new OrderDetail(12,"Vodka",99,3,78);
$orderDetailSecond = new OrderDetail(12,"Gin",100,7,68);
$order->addOrderDetail($orderDetailFirst);
$order->addOrderDetail($orderDetailSecond);

$order->toString();*/
/*
$order->setDate("22/03/2012");
echo $order->getDate();

$order = new Order(0,0,0,0,0);
$det = new OrderDetail(10,"water",40);
$order->addOrderDetails($det);

foreach($order->getOrderDetails() as $order){
    
}

*/






?>