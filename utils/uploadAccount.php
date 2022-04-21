<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/utils/ManagerAccounts.php");
    require_once("./Account.php"); 
    session_start();

    $manager = new ManagerAccounts();
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
    $manager -> insertAccount($userID, $name, $surname, $email, $password1, $type);
?>