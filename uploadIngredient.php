<?php

require_once("bootstrap.php");
$entra = "entra";
$action = $_REQUEST["action"];
if($action == 1){

    var_dump($entra);
    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imageToSave"]);

    var_dump($result);
    var_dump($msg);

}


?>