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
    $birthday = $_REQUEST["birthday"];
    if (isset($_SESSION["type"]) == "Admin"){
        $type = $_REQUEST["tipology"];
    }else{
        $type = "User";
    }
                           
    $manager -> insertAccount($userID, $name, $surname, $email, $password1, $type, $birthday);
    header("location:../index.php");
?>