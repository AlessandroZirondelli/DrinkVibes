<?php

require_once("assets/db/database.php");
    class ManagerProducts{
        private $dbh;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
        }

        /*
        public function getAllProducts() {
            return $this->dbh->getProducts();
        }
*/

        public function getAllBeverageProducts() {
            return $this->dbh->getBeverageProducts();
        }

        public function getAllSpiritsProducts() {
            return $this->dbh->getSpiritsProducts();
        }

        public function getAllWineProducts() {
            return $this->dbh->getWineProducts();
        }
        
        public function getProductsById($id){
            return $this->dbh -> getProductsById($id);
        }
        
      
    }
    
?>