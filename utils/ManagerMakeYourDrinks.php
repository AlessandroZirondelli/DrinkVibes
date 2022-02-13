<?php

require_once("assets/db/database.php");

    class ManageMakeYourDrinks{
        private $dbh;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
        }

        public function getAllMakeYourDrinks(){
                
        }
        
    }

?>