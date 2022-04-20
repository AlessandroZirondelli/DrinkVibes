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
              
        public function updateProducts($id,$quantity){
            return $this->dbh ->updateProduct($id,$quantity);
        }

        public function newProductId(){
            return $this->dbh ->getNewProductId();
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
            $ingredient = $this -> getProductsById($id);
            return $ingredient[0]["qtystock"];
            
        }

        public function getSearchProduct() {
                return $this->dbh->searchProduct();
            
        }
    }
    
?>

