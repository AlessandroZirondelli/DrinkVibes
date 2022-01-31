<?php
class OrderDetail{

    private $orderID; //orderID of order that this order detail belongs to
    private $articleName; //name of article
    private $quantity; // ordered quantity of article
    //private $subtotal;

    public function __construct($orderID, $articleName, $quantity){
         $this-> orderID = $orderID;
         $this-> articleName = $articleName;
         $this-> quantity = $quantity;
         
    }

    public function setOrderID($orderID){
        $this->orderID = $orderID;
    }
    public function getOrderID(){
        return $this->orderID;
    } 

    public function setArticleName($articleName){
        $this->articleName = $articleName;
    }
    public function getArticleName(){
        return $this->articleName;
    } 

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }
    public function getQuantity(){
        return $this->quantity;
    } 
    /*
    public function setSubtotal($subtotal){ // subtotal must be calculate
        $this->subtotal = $subtotal;
    }
    public function getsubtotal(){
        return $this->subtotal;
    } 
    */
}


$detail = new OrderDetail("2987","Coca cola", "2");





?>