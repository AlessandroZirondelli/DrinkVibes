<?php
//chiamato dai file js
    require_once("bootstrap.php");
    require_once("utils/ManagerAccounts.php");
    require_once("utils/Account.php");

    //come in login
    session_start();

    $manager = new ManagerAccounts();


    //if($manager -> checkErrorLogin()){
    
        $name = $_REQUEST["name"];
        $userID = $_REQUEST["userID"];
        $surname = $_REQUEST["surname"];
        $tipology = $_REQUEST["tipology"];
        $email = $_REQUEST["email"];
        $password =$_REQUEST["password"];

        echo $name;
        echo $userID;
        echo $tipology;
        echo $surname;
        echo $email;
                                             
        $manager -> insertAccount($userID, $name, $surname, $email, $password, $type);
    
    
    
?>