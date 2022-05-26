<?php
/*

These paths are correct if they refers to this files
But these are wrong  refers to file "Orders.php" where there is require_once.
require_once("./Order.php"); // includes also OrderDetails.php
require_once("./../assets/db/database.php");*/

require_once("./utils/NotificationStateChanges.php");
require_once("./utils/NotificationOrderReady.php");
require_once("./utils/NotificationNewOrder.php");
require_once("./utils/NotificationSoldOut.php");
require_once("./assets/db/database.php");

    class ManagerNotifications{
        private $dbh;
        private $notificationsTypeOne;
        private $notificationsTypeTwo;
        /* 
            Admin ---> typeOne : new orders don by users    typeTwo : sold out
            Express ---> typeOne : new deliviries to do     typeTwo : empty
            User ---> typeOne: new order done               typeTwo : update order
        */
        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
            $this-> notificationsTypeOne = array();
            $this-> notificationsTypeTwo = array();
        }

        public function addNewNotificationTypeOne($notification){
            array_push($this-> notificationsTypeOne, $notification );
        }

        public function addNewNotificationTypeTwo($notification){
            array_push($this-> notificationsTypeTwo, $notification );
        }

        //This funtion is used in  main-notification to download all new notifications
        public function createNotificationsForAdmin($userRef){ //Creates all notifications to view for Admin
            $res=$this->dbh->getAllNotificationsNewOrder($userRef,"Admin");
            foreach($res as $tmp){ //tmp is a new order notification
                $orderRef=$tmp["orderRef"];
                $notifID=$tmp["notifID"];
                $userRef=$tmp["userRef"];
                $description=$tmp["description"];
                $notif= new NotificationNewOrder($orderRef,$userRef,$description,0,0,$notifID);
                $this->addNewNotificationTypeOne($notif);
            }
            //soldout notifications
            $res=$this->dbh->getAllNotificationsSoldout();
            foreach($res as $tmp){ //tmp is a new order notification
                $articleIDRef=$tmp["articleIDRef"];
                $articleNameRef=$tmp["articleNameRef"];
                $notifID=$tmp["notifID"];
                $notif= new NotificationSoldOut($articleIDRef, $articleNameRef, 0, $notifID);
                $this->addNewNotificationTypeTwo($notif);
            }

        }

        public function createNotificationsForExpress($userRef){ //Creates all notifications to view for Express
            $res=$this->dbh->getAllNotificationsStateReady($userRef);
            foreach($res as $tmp){
                $orderRef=$tmp["orderRef"];
                $notifID=$tmp["notifID"];
                $notif= new NotificationOrderReady($orderRef,"Express",0, $notifID);
                $this->addNewNotificationTypeOne($notif);
                
            }
        }

        public function createNotificationsForUser($userRef){ //Creates all notifications to view for User
            $res=$this->dbh->getAllNotificationsStateChangedByUser($userRef);
            foreach($res as $tmp){
                $orderRef=$tmp["orderRef"];
                $changedState=$tmp["changedState"];
                $notifID=$tmp["notifID"];
                $notif = new NotificationStateChanges($orderRef, $userRef, $changedState,0,$notifID);
                $this->addNewNotificationTypeOne($notif);
            }
            
            $res=$this->dbh->getAllNotificationsNewOrder($userRef,"User");
            foreach($res as $tmp){ //tmp is a new order notification
                $orderRef=$tmp["orderRef"];
                $notifID=$tmp["notifID"];
                //$userRef=$tmp["userRef"];
                $description=$tmp["description"];
                $notif= new NotificationNewOrder($orderRef,$userRef,$description,0,0,$notifID);
                $this->addNewNotificationTypeTwo($notif);
            }
        }

        public function getNotificationsTypeOne(){
            return $this->notificationsTypeOne;
        }

        public function getNotificationsTypeTwo(){
            return $this->notificationsTypeTwo;
        }

        public function createNotifications($type,$loggedUserID){
            if($type=="User"){ //if logged user is user
                $this->createNotificationsForUser($loggedUserID);
            }
            if($type=="Admin"){ //if logged user is Admin
                $this->createNotificationsForAdmin($loggedUserID);
            }
            if($type=="Express"){ //if logged user is Express
                $this->createNotificationsForExpress($loggedUserID);
            }
        }

    }

?>