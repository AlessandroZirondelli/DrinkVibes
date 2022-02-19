<?php
class Ingredient{

    private $ingredientID;
    private $name; 
    private $qtystock;
    private $price; 
    private $description;
    private $typology;
    private $category;


    public function __construct($ingredientID, $name, $qtystock, $price,$description, $typology,$category){
         $this-> ingredientID = $ingredientID;
         $this-> name = $name;
         $this-> qtystock = $qtystock;
         $this-> price = $price;
         $this-> description = $description;
         $this-> typology = $typology;
         $this-> category = $category;
    }

    public function setIngredientID($ingredientID){
        $this->ingredientID = $ingredientID;
    }
    public function getIngredientID(){
        return $this->ingredientID;
    } 

    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    } 

    public function setQty($qtystock){
        $this->qtystock = $qtystock;
    }
    public function getQty(){
        return $this->qtystock;
    } 

    public function setPrice($price){ // subtotal must be calculate
        $this->price = $price;
    }
    public function getPrice(){
        return $this->price;
    } 

    public function setDescription($description){ // subtotal must be calculate
        $this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setTypology($typology){ // subtotal must be calculate
        $this->typology = $typology;
    }
    public function getTypology(){
        return $this->typology;
    }
    public function setCategory($category){ // subtotal must be calculate
        $this->category = $category;
    }
    public function getCategory(){
        return $this->category;
    }


    public function toString(){
        echo "ingredientID:$this->ingredientID "."name: $this->name "."qtystock: $this->qtystock "."price: $this->price "."description: $this->description"."typology: $this->typology"."category: $this->category" ;
    }

}
?>