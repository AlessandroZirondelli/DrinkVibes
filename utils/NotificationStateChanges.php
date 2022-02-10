<?php
/* QUesto percorso va bene in riferimento ad Order, ma non in riferimento a orders.php dove cè il require once
require_once("./OrderDetail.php");
*/

class NotificationStateChanges{

    private $orderRef; // referenced order (optional)
    private $userRef; //userID of customer
    private $changedState; //state of order (optional)
    private $readed; // indicates if user have already read this notification

    public function __construct($orderRef, $userRef, $changedState, $readed){
         $this-> orderRef = $orderRef;
         $this-> userRef = $userRef;
         $this-> changedState = $changedState;
         $this-> readed = $readed;
    }

    public function setOrderRef($orderRef){
        $this->orderRef = $orderRef;
    }
    public function getOrderRef(){
        return $this->orderRef;
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

    public function toString(){
        echo "orderRef: $this->orderRef "."userRef: $this->userRef "."changedState: $this->changedState "."readed: $this->readed ";
    }

}

$notif = new NotificationStateChanges(12,"Nick987","Shipped",0);
$notif->toString();



?>