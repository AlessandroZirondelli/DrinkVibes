<?php

require_once("assets/db/database.php");
    class ManagerProducts{
        private $dbh;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
        }

        //fare funzione unica, che cambia tipologia
        public function getAllBeverageProducts() {
            return $this->dbh->getProductByType("Beverage");
        }

        public function getAllSpiritsProducts() {
            return $this->dbh->getProductByType("Spirits");
        }

        public function getAllWineProducts() {
            return $this->dbh->getProductByType("Wine");
        }
        
        public function getAllDefaultDrink() {
            return $this->dbh->getProductByType("Default drink");
        }
        
        public function getProductsById($id) {
            return $this->dbh->getProductsById($id);
        }

        public function getAllProducts() {
            return $this->dbh->getProduct();
        }

        public function isProductDisponible($id,$qtn){
            $product = $this -> getProductsById($id);
            
            if($product[0]["qtystock"] > intval($qtn)){ //converto
                return true;
            }else{
                return false;
            }
        }
        public function getProductDisponibility($id,$qtn){
            $product = $this -> getProductsById($id);
            return $product[0]["qtystock"];
            
        }

        public function updateProduct($id,$quantity){
            return $this->dbh ->updateProduct($id,$quantity);
        }

        public function insertProduct($name,$image,$description,$quantity,$tipology,$price){
            return $this->dbh ->insertProduct($name,$image,$description,$quantity,$tipology,$price);
        }
        public function deleteProduct($id){
            return $this->dbh ->deleteProduct($id);
        }

    }
    
?>

