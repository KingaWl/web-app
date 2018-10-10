<?php

    session_start();

    if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true))
    {
        header('Location: index-login.php');
        exit();
    }
 
?>

<!DOCTYPE HTML>
<html lang="pl">
<link href="https://fonts.googleapis.com/css?family=Jomhuria&amp;subset=latin-ext" rel="stylesheet"> <html lang="en">
<link rel="Stylesheet" type="text/css" href="../Resources/css/login.css" />
<title>Logowanie</title>
<?php include_once 'header.php'; ?>

<body>
<div class="container">
    <form action="../Controller/logController.php?method=login" method="post">
	    <div class="login-block">
            <h1>zaloguj sie</h1>  
            <input type="text" placeholder="Nazwa użytkownika" name="username"/>
            <input type="password" placeholder="Hasło" name="password"/>
            <div class="false">
            <?php	if(isset($_SESSION['error']))
                    {
                        echo $_SESSION['error']; 
                        unset($_SESSION['error']);
                    }?>
            </div>
            <div class="reg">
                <a href="register.php">Nie masz konta? Zarejestruj się</a>
                <button><b>OK</b></button>
            </div>
        </div>
    </form>
    
   <div class="empty"></div>
</div>

   
<?php include_once "footer.php"; ?>    
</body>
</html>