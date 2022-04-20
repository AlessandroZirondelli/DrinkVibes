<?php
/* QUesto percorso va bene in riferimento ad Order, ma non in riferimento a orders.php dove cè il require once
require_once("./OrderDetail.php");
*/

class InfoIngredient{
    private $name; // for what type of account is the notification
    private $qty;
    private $category;

    public function __construct($name, $qty, $category){
         $this-> name = $name;
         $this-> qty = $qty;
         $this-> category = $category;
    }

    public function setName($name){
        $this-> name = $name;
    }
    public function setQty($qty){
        $this-> qty = $qty;
    }
    public function setCategory($category){
        $this-> category = $category;
    }
    public function getName(){
        return $this->name;
    }
    public function getQty(){
        return $this->qty;
    }
    public function getCategory(){
        return $this->category;
    }
}

?>