<?php

//controllare se è loggato o meno con SESSION se ha già qualcosa o meno
function isUserLoggedIn(){
    return !empty($_SESSION['userID']);
}

//Registro l'utente
function registerLoggedUser($user){
    $_SESSION["userID"] = $user["userID"];
    $_SESSION["name"] = $user["name"];
    $_SESSION["surname"] = $user["surname"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["type"] = $user["type"];
    //$_SESSION["birthdate"] = $user["birthdate"];
    //posso aggiungere altri dati, ma ricorda di aggiungerli alla query
}

/*
function validateDate($birthdate){
    $format = 'Y-m-d'; //"Y-n-j" senza zeri
    $d = DateTime::createFromFormat($format, $birthdate);
    return $d && $d->format($format) === $birthdate;
}


function maggiorenne($sData=null, $nSogliaAnni=18) {
    $format = 'Y-m-d'; //"Y-n-j" senza zeri
    
    $it=false;

    if($sData == null) {
      $sData = DateTime::createFromFormat($format, $sData);
      return $sData && $sData->format($format) === $sData;
    }

    $oDataNascita = new DateTime($sData);
    $oDataAdesso = new DateTime();
    $nAnni = $oDataNascita->diff($oDataAdesso)->y;
    if ($nAnni >= $nSogliaAnni) {
      return $it= true;
    }
    return $it;
}

*/ 
?>