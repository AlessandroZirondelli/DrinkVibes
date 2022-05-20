<?php
require_once 'bootstrap.php';
 
require_once("utils/ManagerAccounts.php");
require_once("utils/Account.php");  

$manager = new ManagerAccounts();

$cssArray[0]="./assets/css/login-style.css";

if($manager -> isUserLoggedIn()){
    $templateParams["title"] = "Login - Access";
    $templateParams["main-content"] = "./template/main-summaryaccount.php";
}
else{
    $templateParams["title"] = "Login - Access";
    $templateParams["main-content"] = "./template/main-accessdenied.php";   
}

require 'template/base.php';
?>