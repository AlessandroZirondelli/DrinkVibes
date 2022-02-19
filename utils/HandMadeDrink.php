<?php

class HandMadeDrink{
    private $id;
    private $ingredients;

    public function __construct(){
        $this -> ingredients = array();

    }
    public function getNumberTypeIng(){
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
    public function isEqualIngredient(Ingredient $ingredient){
        foreach($this -> ingredients as $ing){
            if($ing->getIngredientID() == $ingredient-> getIngredientID() && 
            $ing->getQty() == $ingredient-> getQty()){
                return true;
            }
        }
        return false;
    }
    

    public function addIngredient(Ingredient $ingredient){
        $isPresent = false;
        foreach($this -> ingredients as $ing){
            if($ing->getIngredientID() == $ingredient-> getIngredientID()){
                $ing->setQty($ing->getQty()+$ingredient->getQty());
                $isPresent= true;
            }
        }
        if(!$isPresent){
            array_push($this->ingredients,$ingredient);
        }
    }
    public function getQtyIngredient($id){
        foreach($this -> ingredients as $ing){
            if($ing->getIngredientID() == $id){
               return $ing->getQty();
            }
        }
    }
    public function removeIngredient($id){
        $index = 0;
        foreach($this -> ingredients as $ing){

            if($ing->getIngredientID() == $id){
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