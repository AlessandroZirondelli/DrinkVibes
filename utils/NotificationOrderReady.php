<?php

class NotificationOrderReady{

    private $orderRef; // referenced order 
    private $userRef; //userID of Express 
    private $readed; // indicates if user have already read this notification
    private $notifID;

    public function __construct($orderRef, $userRef, $readed, $notifID){
         $this-> orderRef = $orderRef;
         $this-> userRef = $userRef;
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
        echo "orderRef: $this->orderRef "."userRef: $this->userRef "."readed: $this->readed"."notifID: ".$this->notifID;
    }

}



?>