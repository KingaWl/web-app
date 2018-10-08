<?php

    function insertAd()
    {
        session_start();
        
        $temp_name = $_POST["Przedmiot"];
        $temp_level = $_POST["Poziom"];
        $temp_ad = $_POST["Opis"];
        $temp_place = $_POST["Miejsce"];
        $temp_pay = $_POST["Wynagrodzenie"];

        $addAD = true;

        $database = new Database();
        $db = $database->connect();

        if($temp_name && $temp_level && $temp_ad && $temp_place )
        {
            $addAD==true;

            if(ctype_digit($temp_pay)==false)
            {
                $addAD=false;
                $_SESSION['e_pay']="Pole musi zawierać tylko cyfry!";
                header("Location: ../View/advert.php");
            }
            if($addAD==true)
            {
                if($db->query("INSERT INTO `subject` ( `subject`, `level`, `ad`, `place_of_lesson`, `pay`) 
                VALUES ('$temp_name', '$temp_level', '$temp_ad', '$temp_place', '$temp_pay')"))
                {
                    $id_subject = $db->insert_id;
                    $id_user = $_SESSION['id_user'];
                    $database->query("UPDATE `subject` SET `user_id_user`='$id_user' WHERE `subject`.`id_subject` = '$id_subject'");
               
                    header('Location: ../View/profile.php?msg=OK');
                } 
                else
                echo "Nie dodano nowego ogłoszenia";
            }
            else
            {
                echo "Uzupełnij dane.";
                die();
            }
        }
    }

?>
