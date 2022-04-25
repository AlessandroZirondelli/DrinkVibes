<?php
require_once 'bootstrap.php';
require_once("utils/ManagerAccounts.php");
require_once("utils/Account.php");  

$cssArray[0]="./assets/css/login-style.css";
// va in base per le icone <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

$manager = new ManagerAccounts();


//controlliamo username e password
if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Username o password errata! Riprova.";
    }
    else{
        $manager -> registerLoggedUser($login_result[0]);
        //Serve per reindirizzamento nel momento in cui clicco su Order ma non sono loggato
        //Quindi clicco su order, mi reindirizza al login, dopodichè ritorna in automatico su order
        if(isset($_SESSION["redirect"]) && ($_SESSION["redirect"]=="orders")){
            $_SESSION["redirect"]="empty"; // risetto la variabile ad empty in quanto altrimenti ogni volta che si carica la pagina di login mi si reindirizza in automativo alla pagina degli ordini
            header("location:orders.php");
        }
        elseif(isset($_SESSION["redirect"]) && ($_SESSION["redirect"]=="insertProduct")){
            $_SESSION["redirect"]="empty";
            header("location:insertProduct.php");
        }
        elseif(isset($_SESSION["redirect"]) && ($_SESSION["redirect"]=="insertIngredient")){
            $_SESSION["redirect"]="empty";
            header("location:insertIngredient.php");
        }
        elseif(isset($_SESSION["redirect"]) && ($_SESSION["redirect"]=="notifications")){
            $_SESSION["redirect"]="empty";
            header("location:notifications.php");
        }
        elseif(isset($_SESSION["redirect"]) && ($_SESSION["redirect"]=="shoppingcart")){
            $_SESSION["redirect"]="empty";
            header("location:shoppingcart.php");
        }
    }
}




if($manager -> isUserLoggedIn()){ // se l'utente è già loggato
    if($_SESSION["type"] == "Admin") { 
        $templateParams["title"] = "Manage Account";
        $templateParams["main-content"] = "main-manageaccounts.php";
    }else{
        $templateParams["title"] = "Summary Account";
        $templateParams["main-content"] = "main-summaryaccount.php";
    } 
}
else{ // se l'utente non è loggato
    $templateParams["title"] = "Login";
    $templateParams["main-content"] = "main-loginform.php";
}


require_once("template/base.php");

?>