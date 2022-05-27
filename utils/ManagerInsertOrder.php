<?php

require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/assets/db/database.php");
    class ManagerInsertOrder{
        private $dbh;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
        }
    
        public function insertOrder($idOrder,$idUser,$date,$time,$state,$total){
            return $this->dbh ->updateIngredient($idOrder,$idUser,$date,$time,$state,$total);
        }
        public function getMaxOrdertId(){
            return $this->dbh ->getMaxOrdertId();
        } 
    }
   
?>