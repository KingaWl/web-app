<?php

function getUsers(){
    $database = new Database();
    $database->connect();
    $query= $database->query("SELECT * FROM user");

    while($user = mysqli_fetch_array($query)){
        
        echo '<tr><td>'.$user['id_user'].'</td><td>'.$user['email'].'</td><td>'.$user['password'].'</td><tr>';
    }
}

function insertUser(){

    session_start();

    $temp_name = $_POST["imie"];
    $temp_surname = $_POST["nazwisko"];
    $temp_city = $_POST["miejscowość"];
    $temp_login = $_POST["login"];
    $temp_email = $_POST["email"];
    $temp_password1 = $_POST["haslo"];
    $temp_password2 = $_POST["haslo2"];

    $database = new Database();
    $db = $database->connect();

    $registed_OK = false;
            
    if(isset($temp_email))
    {
        $register_OK = true;

        if((strlen($temp_login)<3) || (strlen($temp_login)>20))
        {
            $register_OK=false;
            $_SESSION['e_login']="Login musi posiadać od 3 do 20 znaków!";
            header("Location: ../View/register.php");
        } 
        
        try
        {
            $dd = $database->connect();
            if($dd->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                $result = $dd->query("SELECT u.id_user FROM user u WHERE u.login='$temp_login'");

                if(!$result) throw new Exception($dd->error);
            
                $how_many_logins = $result->num_rows;
                if($how_many_logins>0)
                {
                    $registed_OK=false;
                    $_SESSION['e_login']="Login zajęty, wybierz inny!";
                    header("Location:../View/register.php");                   
                }

            }
        }
        catch(Exception $e)
        {
            echo "Błąd serwera";
        }

        if(ctype_alnum($temp_name)==false)
        {
            $registed_OK=false;
            $_SESSION['e_name']="Pole nie może zawierać znaków.";
            header("Location: ../View/register.php");
        }

        if(strlen($temp_password1)<8 || (strlen($temp_password1)>20))
        {
            $registed_OK=false;
            $_SESSION['e_pass']="Hasło musi posiadać od 8 do 20 znaków!";
            header("Location:../View/register.php");
        }
    
        if($temp_password1!=$temp_password2)
        {
            $registed_OK=false;
            $_SESSION['e_pass']="Podane hasła różnią się!";
            header("Location:../View/register.php");
        } 

       

        else if($registed_OK=true)
        {
            if($database->query("INSERT INTO `user` (`name`, `surname`, `login`, `password`, `email`) 
            VALUES ('$temp_name', '$temp_surname', '$temp_login', md5('$temp_password2'), '$temp_email')"))
            {
                if($db->query("INSERT INTO `address` (`city`) VALUES ('$temp_city')"))
                {
                    $id_address = $db->insert_id;
                    $database->query("UPDATE `user` SET `address_id_address`='$id_address' WHERE `user`.`login` = '$temp_login'");
                    if($db->query("INSERT INTO `role`(`role`) VALUES ('user')"))
                    {
                        $id_role = $db ->insert_id; 
                        $database->query("UPDATE `user` SET `role_id_role`='$id_role' WHERE `user`.`login` = '$temp_login'");
                        header("location: ../View/index.php?msg=OK");
                    }
                    else
                    {
                        echo "Użytkownik nie został dodany do bazy.";
                        die();
                    }
                }
            }
        }
    }
}

?>
