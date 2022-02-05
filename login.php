<?php
require_once 'bootstrap.php';
$cssArray[0]="./assets/css/login-style.css";
// va in base per le icone <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

//controlliamo username e password
if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Username o password errata! Riprova.";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    $templateParams["title"] = "Login - Accesso";
    $templateParams["main-content"] = "login-home.php";
    
}
else{
    $templateParams["title"] = "Login";
    $templateParams["main-content"] = "login-form.php";
}

require 'template/base.php';
?>