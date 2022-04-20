<?php


class NotificationStateChanges{

    private $orderRef; // referenced order 
    private $userRef; //userID of customer
    private $changedState; //changed state 
    private $readed; // indicates if user have already read this notification
    private $notifID;

    public function __construct($orderRef, $userRef, $changedState, $readed, $notifID){
         $this-> orderRef = $orderRef;
         $this-> userRef = $userRef;
         $this-> changedState = $changedState;
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

    public function setChangedState($changedState){
        $this->changedState = $changedState;
    }
    public function getChangedState(){
        return $this->changedState;
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
        echo "orderRef: $this->orderRef "."userRef: $this->userRef "."changedState: $this->changedState "."readed: $this->readed"."notifID: ".$this->notifID;
    }

}



?>