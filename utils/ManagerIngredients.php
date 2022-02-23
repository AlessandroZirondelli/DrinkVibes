<?php

require_once("assets/db/database.php");
    class ManagerIngredients{
        private $dbh;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
        }
        public function getUnityIngredients(){
            return $this->dbh -> getIngredientByCategory("Unit");
        }
        public function getLiquidIngredients(){
            return $this->dbh -> getIngredientByCategory("Liquid");
        }
        public function getSpiritIngredients(){
            return $this->dbh -> getIngredientByTypology("Spirit");
        }
        public function getWineIngredients(){
            return $this->dbh -> getIngredientByTypology("Wine");
        }
        public function getIngredientById($id){
            return $this->dbh -> getIngredientById($id);
        }
        public function getAlcoholIngredient(){
            return $this->dbh -> getAlcoholIngredient();
        }
        public function getDecorationIngredients(){
            return $this->dbh -> getIngredientByCategory("Unit");
        }
        public function getBeveragesIngredients(){
            return $this->dbh -> getIngredientByTypology("Beverage");
        }
        public function updateIngredient($id,$quantity){
            return $this->dbh ->updateIngredient($id,$quantity);
        }
        public function maxId(){
            return $this->dbh ->getMaxIngredientId();
        }
        public function isDisponibility($id,$qtn){
            $ingredient = $this -> getIngredientById($id);
            
            if($ingredient[0]["qtystock"] > intval($qtn)){
                return true;
            }else{
                return false;
            }
        }
        public function getDisponibility($id){
            $ingredient = $this -> getIngredientById($id);
            return $ingredient[0]["qtystock"];
            
        }
    }
?>