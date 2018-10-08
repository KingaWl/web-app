<?php

include_once '../Config/database.php';
include_once '../Model/User.php';

if(isset($_GET['method'])){
    if($_GET['method']=="insertUser"){
        insertUser();
    }
    else{
        echo "Wrong metod name!";
        die();
    }
}else{
    echo "Wrong metod name!";
    die();
}

?>
