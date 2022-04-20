<?php
class Product{

    private $productID;
    private $name; 
    private $qtystock;
    private $price; 
    private $description;
    private $type;


    public function __construct($productID, $name, $qtystock, $price, $description, $type){
         $this-> productID = $productID;
         $this-> name = $name;
         $this-> qtystock = $qtystock;
         $this-> price = $price;
         $this-> description = $description;
         $this-> type = $type;
    }

    public function setProductID($productID){
        $this->productID = $productID;
    }
    public function getProductID(){
        return $this->productID;
    } 

    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    } 

    public function setQtyStock($qtystock){
        $this->qtystock = $qtystock;
    }
    public function getQtyStock(){
        return $this->qtystock;
    } 

    public function setPrice($price){ 
        $this->price = $price;
    }
    public function getPrice(){
        return $this->price;
    } 

    public function setDescription($description){ 
        $this->description = $description;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setType($type){ 
        $this->type = $type;
    }
    public function getType(){
        return $this->type;
    }
    

    public function toString(){
        echo "productID:$this->productID "."name: $this->name "."qtystock: $this->qtystock "."price: $this->price "."description: $this->description"."type: $this->type" ;
    }

}
?>