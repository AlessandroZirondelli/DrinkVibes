<?php
require_once 'bootstrap.php';

//1 non sono loggato, visito pagina per la prima volta (cookie o session aka dati sensibili)
//2 invio dati per autenticarmi. tento di fare login
//3 sono loggato, vedo home admin

//2
//controllo login in POST e non require perchè contiene anche GET che non ci interessa
//controlliamo username e password
if(isset($_POST["username"]) && isset($_POST["password"])){
    //controllo se ci sono nel db
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    
    if(count($login_result)==0){
        //login fallito
        $templateParams["errorelogin"] = "Username o password errata! Riprova.";
    }else{
        //login con successo
        registerLoggedUser($login_result[0]); //recupero l'utente

    }
}
//utente loggato o meno
if(isUserLoggedIn()){
    //pagina admin
    $templateParams["titolo"] = "Blog TW - Admin";
    $templateParams["nome"] = "login-home.php";

}else{
    $templateParams["titolo"] = "Blog TW - Login";
    $templateParams["nome"] = "login-form.php";

}

/*
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
*/

require 'template/base.php';
?>