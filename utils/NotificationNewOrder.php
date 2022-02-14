<?php
/* QUesto percorso va bene in riferimento ad Order, ma non in riferimento a orders.php dove cè il require once
require_once("./OrderDetail.php");
*/

class NotificationNewOrder{

    private $orderRef; // referenced order 
    private $userRef; //userID of customer
    private $description; //changed state 
    private $readedUser; // indicates if user have already read this notification
    private $readedAmm;
    private $notifID;

    public function __construct($orderRef, $userRef, $description, $readedUser, $readedAmm, $notifID){
         $this-> orderRef = $orderRef;
         $this-> userRef = $userRef;
         $this-> description = $description;
         $this-> readedUser = $readedUser;
         $this-> readedAmm = $readedAmm;
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

    public function setReadedUser($readedUser){
        $this->readedUser = $readedUser;
    }
    public function getReadedUser(){
        return $this->readedUser;
    }

    public function setReadedAmm($readedAmm){
        $this->readedAmm = $readedAmm;
    }
    public function getReadedAmm(){
        return $this->readedAmm;
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