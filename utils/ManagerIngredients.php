<?php

require_once("assets/db/database.php");

    class ManagerIngredients{
        private $dbh;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
        }
        public function getAllUnityIngredients(){
            return $this->dbh -> getUnityIngredient();
        }
        public function getAllLiquidIngredients(){
            return $this->dbh -> getLiquidIngredient();
        }
        
    }

?>