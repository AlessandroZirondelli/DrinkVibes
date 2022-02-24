<?php
/* QUesto percorso va bene in riferimento ad Order, ma non in riferimento a orders.php dove cè il require once
require_once("./OrderDetail.php");
*/

class InfoIngredient{
    private $name; // for what type of account is the notification
    private $qty;

    public function __construct($name, $qty){
         $this-> name = $name;
         $this-> qty = $qty;
    }

    public function setName($name){
        $this-> name = $name;
    }
    public function setQty($qty){
        $this-> qty = $qty;
    }
    public function getName(){
        return $this->name;
    }
    public function getQty(){
        return $this->qty;
    }
}

?>