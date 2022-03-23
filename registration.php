<?php
require_once 'bootstrap.php';
$cssArray[0]="./assets/css/login-style.css";
//va in base per le icone <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

if (isset($_POST["login"])) {

    $name ="";
    $email="";
    $surname="";
    $username="";
    $birthdate="";
    $password="";
    $pwd="";
    $type="";
    
    //controllo campi vuoti
    if (empty($_POST["name"])) {
        $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
    } else {
        $name =  $_POST["name"];
    }
    
    if (empty($_POST["email"])) {
        $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
    } else {
        $email =  $_POST["email"];

        //controllo validità email
        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $templateParams["email"] = "Formato email non corretto";
        }
    }
    
    if (empty($_POST["surname"])) {
        $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
    } else {
        $surname =  $_POST["surname"];
    } 

    if (empty($_POST["userID"])) {
        $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
    } else {
        $username = $_POST["userID"];
    }

    if (empty($_POST["password"])) {
        $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
    } else {
        $password = $_POST["password"];
    }

    if (empty($_POST["pwd"])) {
        $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
    } else {
        $pwd = $_POST["pwd"];
    }

    if (empty($_POST["type"])) {
        $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
    } else {
        $type = $_POST["type"];
    }

    /* DATA COMPLEANNO
    if (empty($_POST["birthdate"])) {
        $templateParams["errorevuoto"] = "Errore! Sono presenti alcuni campi vuoti";
    } else {
        $birthdate = $_POST["birthdate"];
        

        //controllo formato data
        if (validateDate($birthdate)) {
            $templateParams["data"] = "Formato data sbagliato. Scrivere Anno-Mese-Giorno";
        }

        //controllo data maggiorenne
        $_POST["birthdate"]= $sDataDiNascita;
        //$sDataDiNascita = "1995-12-12";
        $bMaggiorenne = maggiorenne($sDataDiNascita);                       
        if ($bMaggiorenne) {                                                     
            $templateParams["vino"] ='vino, liquori e tutte le altre bevande';         
        } else {                                                                 
            $templateParams["acqua"] =  'acqua e bevande gassate';              
        }
    }
*/

    //controllo caratteri dei campi
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $templateParams["lettere"]  = "Only letters and white space allowed";
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/",$surname)) {
        $templateParams["lettere"]  = "Only letters and white space allowed";
    }

    //controllo password combacia
    if($password != $pwd) {
        $templateParams["pwd"] ="password no uguale";
    }

    //controllo esistenza del utente
    $duplicate = $dbh->checkDuplication($username, $email);
    if(count($duplicate)!=0){
        $templateParams["erroreusata"] = "Errore! Questo utente è già registrato";
    } else {
        //aggiungo utente
        //$registration_result = $dbh->registrationNewUser($username, $name, $surname, $email, $password);
        //registerLoggedUser($registration_result[0]);
    }

}



if(isUserLoggedIn()){
    //pagina admin
    $templateParams["title"] = "Registration";
    if($_SESSION["type"] == "Admin") { //sarebbe admin
        $templateParams["main-content"] = "registration-form.php";
    } else {
        $templateParams["main-content"] = "registration-home.php";
    }

}else{
    $templateParams["title"] = "Registration";
    $templateParams["main-content"] = "registration-form.php";

}


/*
$query_registrazione = mysql_query("INSERT INTO users (username,password,email)
VALUES ('".$_POST["username_reg"]."','".$_POST["password_reg"]."','".$_POST["email_reg"]."')") // scrivo sul DB questi valori

$query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
mysqli_query($conn, $query);
*/

require 'template/base.php';

?>