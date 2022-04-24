<?php

require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/assets/db/database.php");

    class ManagerHandMakeDrink{
        private $dbh;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
        }

       public function addHandMadeDrink($drinkID, $ingredientID, $qty){
            $this->dbh->insertHandMadeDrink($drinkID, $ingredientID, $qty);
       }
        
    }

?>