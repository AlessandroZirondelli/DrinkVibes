<?php
require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/assets/db/database.php");
    class ManagerAccounts{
        private $dbh;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
        }

        public function insertAccount($userID, $name, $surname, $email, $password, $type, $birthdate){
            return $this->dbh ->insertAccount($userID, $name, $surname, $email, $password, $type, $birthdate);
        }

        //controllare se è loggato o meno con SESSION se ha già qualcosa o meno
        public function isUserLoggedIn(){
            return !empty($_SESSION['userID']);
        }

        //Registro l'utente x mostrarlo
        public function registerLoggedUser($user){
            $_SESSION["userID"] = $user["userID"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["surname"] = $user["surname"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["type"] = $user["type"];
            $_SESSION["birthdate"] = $user["birthdate"];
            //posso aggiungere altri dati, ma ricorda di aggiungerli alla query
        }
        public function isAvailableUserId($userId){
            if(count($this -> dbh ->getUserByUserId($userId)) == 0){
                return true;
            }else{
                return false;
            }
        }

// messa in insertaccount
        public function checkErrorLogin() {
            if (isset($_POST["login"])) {

                $name ="";
                $email="";
                $surname="";
                $username="";
                $birthdate="";
                $password="";
                $pwd="";
                $type="";
                
                //controllo campi vuoti
                if (empty($_POST["name"])) {
                    $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
                } else {
                    $name =  $_POST["name"];
                }
                
                if (empty($_POST["email"])) {
                    $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
                } else {
                    $email =  $_POST["email"];
            
                    //controllo validità email
                    if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                        $templateParams["email"] = "Formato email non corretto";
                    }
                }
                
                if (empty($_POST["surname"])) {
                    $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
                } else {
                    $surname =  $_POST["surname"];
                } 
            
                if (empty($_POST["userID"])) {
                    $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
                } else {
                    $username = $_POST["userID"];
                }
            
                if (empty($_POST["password"])) {
                    $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
                } else {
                    $password = $_POST["password"];
                }
            
                if (empty($_POST["pwd"])) {
                    $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
                } else {
                    $pwd = $_POST["pwd"];
                }
            
                if (empty($_POST["type"])) {
                    $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
                } else {
                    $type = $_POST["type"];
                }
            
                /* DATA COMPLEANNO
                if (empty($_POST["birthdate"])) {
                    $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
                } else {
                    $birthdate = $_POST["birthdate"];
                    
            
                    //controllo formato data
                    if (validateDate($birthdate)) {
                        $templateParams["data"] = "Formato data sbagliato. Scrivere Anno-Mese-Giorno";
                    }
            
                    //controllo data maggiorenne
                    $_POST["birthdate"]= $sDataDiNascita;
                    //$sDataDiNascita = "1995-12-12";
                    $bMaggiorenne = maggiorenne($sDataDiNascita);                       
                    if ($bMaggiorenne) {                                                     
                        $templateParams["vino"] ='vino, liquori e tutte le altre bevande';         
                    } else {                                                                 
                        $templateParams["acqua"] =  'acqua e bevande gassate';              
                    }
                }
            */
            
                //controllo caratteri dei campi
                if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                    $templateParams["lettere"]  = "Only letters and white space allowed";
                }
            
                if (!preg_match("/^[a-zA-Z-' ]*$/",$surname)) {
                    $templateParams["lettere"]  = "Only letters and white space allowed";
                }
            
                //controllo password combacia
                if($password != $pwd) {
                    $templateParams["pwd"] ="password no uguale";
                }
            
                
            
            }
    }


    }

?>