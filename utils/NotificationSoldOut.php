<?php


class NotificationSoldOut{

    private $articleIDRef; // referenced order 
    private $articleNameRef; //userID of customer 
    private $readed; // indicates if user have already read this notification
    private $notifID;

    public function __construct($articleIDRef, $articleNameRef, $readed, $notifID){
         $this-> articleIDRef = $articleIDRef;
         $this-> articleNameRef = $articleNameRef;
         $this-> readed = $readed;
         $this-> notifID = $notifID;
    }

    public function setArticleIDRef($articleIDRef){
        $this->articleIDRef = $articleIDRef;
    }
    public function getArticleIDRef(){
        return $this->articleIDRef;
    }

    public function setArticleNameRef($articleNameRef){
        $this->articleNameRef = $articleNameRef;
    }
    public function getArticleNameRef(){
        return $this->articleNameRef;
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
        echo "articleIDRef: $this->articleIDRef "."articleNameRef: $this->articleNameRef "."readed: $this->readed"."notifID: ".$this->notifID;
    }

}



?>