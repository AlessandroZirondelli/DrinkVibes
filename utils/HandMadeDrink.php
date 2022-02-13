<?php

class HandMadeDrink{
    private $id;
    private $ingredients;

    public function __construct(){
        $this -> ingredients = array();

    }
    public function getNumerTypeIng(){
        return count($this -> ingredients);
    }
    
    public function getIngredient(){
       return $this -> ingredients;
    }
    public function getId(){
        return $this -> id;
    }
    public function setId($id){
        return $this -> id = $id;
    }
    public function addIngredient(Ingredient $ingredient){
        $isPresent = false;
        foreach($this -> ingredients as $ing){
            if($ing->getingredientID() == $ingredient-> getIngredientID()){
                $ing->setQtyStock($ing->getQtyStock()+$ingredient->getQtyStock());
                $isPresent= true;
            }
        }
        if(!$isPresent){
            array_push($this->ingredients,$ingredient);
        }
    }
    public function getQtyIngredient($id){
        foreach($this -> ingredients as $ing){
            if($ing->getingredientID() == $id){
               return $ing->getQtyStock();
            }
        }
    }
    public function removeIngredient($id){
        $index = 0;
        foreach($this -> ingredients as $ing){

            if($ing->getingredientID() == $id){
               unset($this -> ingredients[$index]);
            }
            $index = $index + 1;
        }
    }
    public function toString(){
        echo "ingredientID:$this->id "."name: $this->name "."qtystock: $this->qtystock "."price: $this->price "."description: $this->description"."typology: $this->typology"."category: $this->category" ;
    }

}
?>