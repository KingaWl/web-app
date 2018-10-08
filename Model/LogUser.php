<?php

    function loginUser()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $username = htmlentities($username, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        $database = new Database();
        $connection = $database -> connect();

        if($query= $database->query(
        sprintf("SELECT * FROM user WHERE login='%s' AND password='%s'",
        mysqli_real_escape_string($connection,$username),
        mysqli_real_escape_string($connection,$password))))
        {
            $how_many = $query->num_rows;
            if($how_many>0)
            {
                $_SESSION['logged'] = true;

                $row = $query->fetch_assoc();
                $_SESSION['id'] = $row['id_user'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['email'] = $row['email'];
                
                unset($_SESSION['error']);
                $query->free_result();

                header('Location: ../View/index-login.php');

            }else{

                $_SESSION['error'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location: ../View/login.php');
            }
        }
    }
	
?>