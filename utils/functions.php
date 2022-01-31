<?php

//controllare se è loggato o meno con SESSION se ha già qualcosa o meno
function isUserLoggedIn(){
    return isset($_SESSION["idautore"]);
}

//registro utente
function registerLoggedUser($user){
    $_SESSION["idautore"] = $user["idautore"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["nome"] = $user["nome"];
    //aggiungere altri dati
}

?>