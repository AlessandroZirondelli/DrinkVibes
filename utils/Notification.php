<?php


class Notification{
    private $forWho; // for what type of account is the notification
    private $orderRef; // referenced order (optional)
    private $articRef; //referenced article (optional)
    private $state; //state of order (optional)
    private $customerID; //userID of customer
    private $readed; // indicates if user have already read this notification

    public function __construct($forWho, $orderRef, $articRef, $state, $customerID, $readed){
         $this-> forWho = $forWho;
         $this-> orderRef = $orderRef;
         $this-> articRef = $articRef;
         $this-> state = $state;
         $this-> customerID = $customerID;
         $this-> readed = $readed;
    }

    public function setForWho($forWho){
        $this->forWho = $forWho;
    }
    public function getForWho(){
        return $this->forWho;
    }

    public function setOrderRef($orderRef){
        $this->orderRef = $orderRef;
    }
    public function getOrderRef(){
        return $this->orderRef;
    }

    public function setArticRef($articRef){
        $this->articRef = $articRef;
    }
    public function getArticRef(){
        return $this->articRef;
    }

    public function setState($state){
        $this->state = $state;
    }
    public function getState(){
        return $this->state;
    }

    public function setCustomerID($customerID){
        $this->customerID = $customerID;
    }
    public function getCustomerID(){
        return $this->customerID;
    }

    public function setReaded($readed){
        $this->readed = $readed;
    }
    public function getReaded(){
        return $this->readed;
    }

    public function toString(){
        echo "forWho:$this->forWho "."orderRef: $this->orderRef "."articRef: $this->articRef "."state: $this->state "."customerID: $this->customerID "."readed:$this->readed";
    }

}

?>