<?php

require_once("bootstrap.php");
    var_dump($_FILES["imageToSave"]);
    var_dump($_FILES["imageToSave"]["name"] );
    if($_FILES["imageToSave"]["name"] != ""){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imageToSave"]);
    }
    header("location:products.php");
?>


    