<?php
/*
Questi percorsi vanno bene in riferimento a questo file "ManagerOrders.php
Ma non vanno bene , dal file "Ordrs.php" in cui faccio il require_once.

require_once("./Order.php"); // include anche OrderDetails.php
require_once("./../assets/db/database.php");*/

require_once("./utils/Order.php");
require_once("./assets/db/database.php");

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
            $this-> notifications = array();
        }

        public function addNewNotification($notification){
            array_push($this-> notifications, $notification );
        }

        //questa funzione verrà usata in main-notification per scaricare tutte le notifiche
        public function createNotificationsForAdmin(){ //crea tutte le notifiche DA FAR VISUALIZZARE relative all'Admin

        }

        public function createNotificationsForExpress(){ //crea tutte le notifiche DA FAR VISUALIZZARE relative all'Express

        }

        public function createNotificationsForExpress(){ //crea tutte le notifiche DA FAR VISUALIZZARE relative allo User

        }

        public function insertNewOrderNotification(){


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

   /* $man = new ManagerOrders();
    $man->createOrdersByUser("Nick987");
*/
?>