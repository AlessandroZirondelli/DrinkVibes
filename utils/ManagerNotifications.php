<?php
/*
Questi percorsi vanno bene in riferimento a questo file "ManagerOrders.php
Ma non vanno bene , dal file "Ordrs.php" in cui faccio il require_once.

require_once("./Order.php"); // include anche OrderDetails.php
require_once("./../assets/db/database.php");*/


require_once("./utils/NotificationStateChanges.php");
require_once("./utils/NotificationOrderReady.php");
require_once("./utils/NotificationNewOrder.php");
require_once("./utils/NotificationSoldOut.php");
require_once("./assets/db/database.php");

//require_once("./NotificationStateChanges.php");
//require_once("./../assets/db/database.php");

    class ManagerNotifications{
        private $dbh;
        private $notificationsTypeOne;
        private $notificationsTypeTwo;
        /* 
            Admin ---> typeOne : nuovi ordini     typeTwo : scorta terminata
            Express ---> typeOne : nuove spedizioni da fare     typeTwo : vuoto
            User ---> typeOne: nuovi ordini fatti   typeTwo : aggiornamento ordine
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

        //questa funzione verrà usata in main-notification per scaricare tutte le notifiche
        public function createNotificationsForAdmin($userRef){ //crea tutte le notifiche DA FAR VISUALIZZARE relative all'Admin
            $res=$this->dbh->getAllNotificationsNewOrder($userRef,"Admin");
            foreach($res as $tmp){ //tmp is a new order notification
                $orderRef=$tmp["orderRef"];
                $notifID=$tmp["notifID"];
                $userRef=$tmp["userRef"];
                $description=$tmp["description"];
                $notif= new NotificationNewOrder($orderRef,$userRef,$description,0,0,$notifID);
                $this->addNewNotificationTypeOne($notif);
            }

            $res=$this->dbh->getAllNotificationsSoldout();
            foreach($res as $tmp){ //tmp is a new order notification
                $articleIDRef=$tmp["articleIDRef"];
                $articleNameRef=$tmp["articleNameRef"];
                $notifID=$tmp["notifID"];
                $notif= new NotificationSoldOut($articleIDRef, $articleNameRef, 0, $notifID);
                $this->addNewNotificationTypeTwo($notif);
            }

            //qui ci sarà il secondo ciclo che scorrerà le notifiche di soldout

        }

        public function createNotificationsForExpress($userRef){ //crea tutte le notifiche DA FAR VISUALIZZARE relative all'Express
            $res=$this->dbh->getAllNotificationsStateReady($userRef);
            foreach($res as $tmp){
                $orderRef=$tmp["orderRef"];
                $notifID=$tmp["notifID"];
                $notif= new NotificationOrderReady($orderRef,"Express",0, $notifID);
                $this->addNewNotificationTypeOne($notif);
                
            }
        }

        public function createNotificationsForUser($userRef){ //crea tutte le notifiche DA FAR VISUALIZZARE relative allo User
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

            //qui deve essere aggiunta anche l'altra tipologia di notifica
        }

        public function getNotificationsTypeOne(){
            return $this->notificationsTypeOne;
        }

        public function getNotificationsTypeTwo(){
            return $this->notificationsTypeTwo;
        }

        public function createNotifications($type,$loggedUserID){
            if($type=="User"){ //se l'utente loggatto è uno user
                $this->createNotificationsForUser($loggedUserID);
            }
            if($type=="Admin"){ //se l'utente loggatto è uno user
                $this->createNotificationsForAdmin($loggedUserID);
            }
            if($type=="Express"){ //se l'utente loggatto è uno user
                $this->createNotificationsForExpress($loggedUserID);
            }
        }



        /* Se sono amministratore :
            -sold out ---> mi serve l'id e il norme dell'articolo soldout
            articlereference,nome artcoolo
            L'articolo numero 56626 Vodka pè terminato.
            -ordini nuovi ---> mi serve l'ìd dell'ordine , il cliente
            username, nome cognome, id ordie data
            "L'utente Pippo Rossi, Pippo345 ha effettuato un nuovo ordine: 1532 in data 17/08/2021 "

           Se sono fattorino :
           "L'utente Pippo345 ha effettuato un nuovo ordine: 1532  I prodotti sono pronti per la spedizione!"
            -nuovi ordini che sono in ready to delivery, quindi sono da spedire  -->  id ordine, data ordine, destinatario

           Se sono utente :
           "Lo stato dell'ordine numero 5362762 , effettuato in data 16/07/2021 ha cambiato stato in: Ready to prepare "
            "Hai effettuato l'ordine numero 5362762 , effettuato in data 16/07/2021 ha cambiato stato in: Ready to prepare "
           */

    }
/*
    $manager = new ManagerNotifications();
    $manager -> createNotificationsForUser("Nick987");
    $not =  $manager->getNotificationsTypeOne();
    foreach($not as $tmp){
        $tmp->toString();

    }

*/

?>