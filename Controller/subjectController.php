<?php
include_once '../Config/database.php';
include_once '../Model/Subject.php';

    if(isset($_GET['method'])){
        if($_GET['method']=="insertAd"){
            insertAd();
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