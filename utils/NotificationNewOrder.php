<?php
/* QUesto percorso va bene in riferimento ad Order, ma non in riferimento a orders.php dove cè il require once
require_once("./OrderDetail.php");
*/

class NotificationNewOrder{

    private $orderRef; // referenced order 
    private $userRef; //userID of customer
    private $description; //changed state 
    private $readed; // indicates if user have already read this notification
    private $notifID;

    public function __construct($orderRef, $userRef, $description, $readed, $notifID){
         $this-> orderRef = $orderRef;
         $this-> userRef = $userRef;
         $this-> description = $description;
         $this-> readed = $readed;
         $this-> notifID = $notifID;
    }

    public function setOrderRef($orderRef){
        $this->orderRef = $orderRef;
    }
    public function getOrderRef(){
        return $this->orderRef;
    }

    public function setUserRef($userRef){
        $this->userRef = $userRef;
    }
    public function getUserRef(){
        return $this->userRef;
    }

    public function setDescription($description){
        $this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }

    public function setReaded($readed){
        $this->readed = $readed;
    }
    public function getReaded(){
        return $this->readed;
    }

    public function setNotifID($notifID){
        $this->notifID = $notifID;
    }
    public function getNotifID(){
        return $this->notifID;
    }

    public function toString(){
        echo "orderRef: $this->orderRef "."userRef: $this->userRef "."description: $this->description "."readed: $this->readed"."notifID: ".$this->notifID;
    }

}



?>