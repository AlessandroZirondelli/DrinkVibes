<?php

require_once("assets/db/database.php");
require_once("./utils/InfoIngredient.php");

    class ManagerInfoDrink{
        private $ingredients;

        public function __construct() {
            $this->dbh = new DatabaseHelper("localhost","root","", "drinkdb",3306);
            $this-> ingredients = array();
        }

        public function addIngredient($ing){
            array_push($this-> ingredients, $ing );
        }

        public function createIngredientsOfDrink($drinkID){
            $allIngredients = $this-> dbh->getIngredientsCustomDrink($drinkID);
            foreach($allIngredients as $tmp){
                $name = $this->dbh-> getIngredientName($tmp["ingredientID"]);
                $qty = $tmp["qty"];
                $singleIngredient = new InfoIngredient($name, $qty);
                $this->addIngredient($singleIngredient);
            }
        }

        public function getAllIngredients(){
            return $this->ingredients;
        }
    }
?>