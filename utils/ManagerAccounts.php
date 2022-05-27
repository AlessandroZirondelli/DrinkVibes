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

        //check if the user is logged in with SESSION. If the session already has something or not
        public function isUserLoggedIn(){
            return !empty($_SESSION['userID']);
        }

        // Register the user to show it
        public function registerLoggedUser($user){
            $_SESSION["userID"] = $user[0]["userID"];
            $_SESSION["name"] = $user[0]["name"];
            $_SESSION["surname"] = $user[0]["surname"];
            $_SESSION["email"] = $user[0]["email"];
            $_SESSION["type"] = $user[0]["type"];
            $_SESSION["birthdate"] = $user[0]["birthdate"];
        }
        
        public function getInfoAccount($userID){
            return $this -> dbh->getInfoAccount($userID);
        }

        public function isAvailableUserId($userId){
            if(count($this -> dbh ->getUserByUserId($userId)) == 0){
                return true;
            }else{
                return false;
            }
        }


    }

?>