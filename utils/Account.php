<?php
class Account{

    private $userID;
    private $name; 
    private $surname;
    private $email; 
    private $password;
    private $type;


    public function __construct($userID, $name, $surname, $email, $password, $type){ //+compleanno
         $this-> userID = $userID;
         $this-> name = $name;
         $this-> surname = $surname;
         $this-> email = $email;
         $this-> password = $password;
         $this-> type = $type;
    }

    public function setUserID($userID){
        $this->userID = $userID;
    }
    public function getUserID(){
        return $this->userID;
    } 

    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    } 

    public function setSurname($surname){
        $this->surname = $surname;
    }
    public function getSurname(){
        return $this->surname;
    } 

    public function setEmail($email){ 
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    } 

    public function setPassword($password){ 
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setType($type){ 
        $this->type = $type;
    }
    public function getType(){
        return $this->type;
    }
    

    public function toString(){
        echo "userID:$this->userID "."name: $this->name "."surname: $this->surname "."email: $this->email "."password: $this->password"."type: $this->type" ;
    }

}
?>