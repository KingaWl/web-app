<?php
include_once '../Config/database.php';
include_once '../Model/LogUser.php';



if(isset($_GET['method'])){
    if($_GET['method']=="login"){
        loginUser();
    }
    else if($_GET['method']=="logout"){
        logoutUser();
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