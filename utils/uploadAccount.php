<?php
//chiamato dai file js
    //$path = $_SERVER['DOCUMENT_ROOT']."/DrinkVibes"."/utils"."/ManagerAccounts.php";
    //echo $path;
    require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/utils/ManagerAccounts.php");
    require_once("./Account.php"); 
    //come in login
    session_start();

    $manager = new ManagerAccounts();
    //if($manager -> checkErrorLogin()){
    
        $name = $_REQUEST["name"];
        $userID = $_REQUEST["userID"];
        $surname = $_REQUEST["surname"];
        $email = $_REQUEST["email"];
        $password1 =$_REQUEST["password1"];
        $password1 =$_REQUEST["password2"];
        
        $type = "User";


        echo $name;
        echo $userID;
        echo $surname;
        echo $email;
        //($userID, $name, $surname, $email, $password, $type)                                 
        $manager -> insertAccount($userID, $name, $surname, $email, $password1, $type);
    
     //define (__DIR__ , "C:\xampp\htdocs\DrinkVibes");
     //echo $_SERVER['DOCUMENT_ROOT'] ;
?>