<?php
require_once("./OrderDetail.php");
class Order{
    private $userID;
    private $orderID;
    private $date;
    private $time;
    private $state;
    private $orderDetails;

    public function __construct($userID, $orderID, $date, $time, $state){
         $this-> userID = $userID;
         $this-> orderID = $orderID;
         $this-> date = $date;
         $this-> time = $time;
         $this-> state = $state;
         $this-> orderDetails = array();
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

    public function addOrderDetails($detail){ // it takes OrderDetail object
        array_push($this->orderDetails,$detail);
    }

    


   
}

/*
$order = new Order(12,45643,"12-09-2000","23:54","Delivered");

$order->setDate("22/03/2012");
echo $order->getDate();

$order = new Order(0,0,0,0,0);
$det = new OrderDetail(10,"water",40);
$order->addOrderDetails($det);

foreach($order->getOrderDetails() as $order){
    
}

*/






?>