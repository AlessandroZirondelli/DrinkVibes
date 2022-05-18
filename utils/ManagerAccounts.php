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
            $_SESSION["userID"] = $user["userID"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["surname"] = $user["surname"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["type"] = $user["type"];
            $_SESSION["birthdate"] = $user["birthdate"];
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