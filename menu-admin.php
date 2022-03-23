<?php
require_once 'bootstrap.php';

$cssArray[0]="./assets/css/login-style.css";

if(isUserLoggedIn()){
    $templateParams["title"] = "Login - Access";
    $templateParams["main-content"] = "login-home.php";
}

require 'template/base.php';
?>